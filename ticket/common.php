<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

session_start ();

function isLoggedIn() {
     $user = getSession("USER_SESSION");
   if( isset($user) ) {
      return true;
} else {
 return false;
}
}


function getConnection() {
return mysqli_connect ( "localhost", "root", "", "bitf_ticket_system" );
}

/**
 *
 * @param unknown $name        	
 */
function removeSession($name) {
	if (isset ( $_SESSION [$name] )) {
		unset ( $_SESSION [$name] );
	}
}
/**
 *
 * @param unknown $property        	
 * @return mixed
 */
function getSession($property) {
	if (isset ( $_SESSION [$property] )) {
		return unserialize ( $_SESSION [$property] );
	}
}
/**
 *
 * @param unknown $name        	
 * @param unknown $value        	
 */
function setSession($name, $value) {
	$_SESSION [$name] = serialize ( $value );
}
/**
 */
function clearSession() {
	foreach ( $_SESSION as $key => $value ) {
		if (isset ( $_SESSION [$key] )) {
			unset ( $_SESSION [$key] );
		}
	}
}

/**
 * Call this method to get single instance of class.
 *
 * @return Paths
 */
function sendEmail($email, $fullName, $subject, $body, $pdfpath, $pdfname) {
	include_once 'lib/email/class.phpmailer.php';
	$mail = new PHPMailer ();
	$mail->IsSMTP (); // telling the class to use SMTP
	// $mail->Host = "secure.emailsrvr.com"; // SMTP server
	//$mail->SMTPDebug = 1; // enables SMTP debug information (for testing)
	// 1 = errors and messages
	// 2 = messages only
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	$mail->Host = "bh-in-8.webhostbox.net"; // sets GMAIL as the SMTP server
	$mail->Port = 465; // set the SMTP port for the GMAIL server
	$mail->Username = "educare@burhaniit.org"; // GMAIL username
	$mail->Password = "bito@)!^"; // GMAIL password
	$mail->SetFrom ( 'educare@burhaniit.org', 'Burhani IT Fraternity' );
	$mail->AddReplyTo ( "educare@burhaniit.org", "Burhani IT Fraternity" );

	$mail->Subject = $subject;
	$mail->MsgHTML ( $body );
	$mail->AddAddress ( $email, $fullName );
        $mail->AddAttachment($pdfpath, $pdfname, 'base64','application/pdf');

	if (! $mail->Send ()) {
		return false;
	} else {
		return true;
	}
}


function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}