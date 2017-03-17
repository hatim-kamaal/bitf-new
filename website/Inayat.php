<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$clearData = true;
$msgRef = false;
$msg = "";

$method = $_SERVER ['REQUEST_METHOD'];
if ($method === 'POST') {
	$msgRef = true;
	
	$name = $_POST["name"];
	$its = $_POST["its"];
	$mohalla = $_POST["mohalla"];
	$address = $_POST["address"];
	$mobile = $_POST["mobile"];
	$email = $_POST["email"];
	$school = $_POST["school"];
	$standard = $_POST["standard"];
	$board = $_POST["board"];
	$madrasa = $_POST["madrasa"];
	$paymentCycle = $_POST["paymentCycle"];
	$totalRequired = $_POST["totalRequired"];
	$ownPart = $_POST["ownPart"];
	$trustPart = $_POST["trustPart"];
	$fatherOccupation = $_POST["fatherOccupation"];
	$motherOccupation = $_POST["motherOccupation"];
	$appliedAnywhere = $_POST["appliedAnywhere"];
	$remarks = $_POST["remarks"];
	
	$query = "INSERT INTO EDUCARE_HELP_REQUEST (STUDENT_NAME,
			STUDENT_ITS,MOHALLA,ADDRESS,MOBILE,EMAIL,SCHOOL_NAME,STANDARD,EXAM_BOARD,
			MADARSA,PAYMENT_CYCLE,FEES_REQUIREMENT,YOUR_PART,TRUST_PART,FATHER_OCCUPATION,
			MOTHER_OCCUPATION,APPLIED_ANYWHERE,REMARKS) VALUES ('$name',$its,
			'$mohalla','$address',$mobile,'$email','$school','$standard','$board','$madrasa','$paymentCycle',
			$totalRequired,$ownPart,$trustPart,'$fatherOccupation','$motherOccupation','$appliedAnywhere','$remarks'
			)";

// 	$query  = "INSERT INTO EDUCARE_HELP_REQUEST (STUDENT_NAME) VALUES ('$name')";

        $body = "Following request has been received.<br/><br/><table border=1 width='100%'>
<tr><th>Student Name</th><td>$name</td></tr>
<tr><th>Student ITS</th><td>$its</td></tr>
<tr><th>Mohalla</th><td>$mohalla</td></tr>
<tr><th>Address</th><td>$address</td></tr>
<tr><th>Contact</th><td>$mobile</td></tr>
<tr><th>Email</th><td>$email</td></tr>
<tr><th>School Name</th><td>$school</td></tr>
<tr><th>Standard</th><td>$standard</td></tr>
<tr><th>Board</th><td>$board</td></tr>
<tr><th>Madarasa</th><td>$madrasa</td></tr>
<tr><th>Payment cycle</th><td>$paymentCycle</td></tr>
<tr><th>Total requirement</th><td>$totalRequired</td></tr>
<tr><th>Self contribution</th><td>$ownPart</td></tr>
<tr><th>BITF Contribution</th><td>$trustPart</td></tr>
<tr><th>Fathers Occupation</th><td>$fatherOccupation</td></tr>
<tr><th>Mother Occupation</th><td>$motherOccupation</td></tr>
<tr><th>Applied anywhere else</th><td>$appliedAnywhere</td></tr>
<tr><th>Remarks</th><td>$remarks</td></tr>
</table><br/><br/>Regards<br/>Online Inayat Form";	
        
        sendEmail('educare@burhaniit.org', 'Core Team', 'New Request', $body);
//        sendEmail('hatim.kamaal@gmail.com', 'Core Team', 'New Request', $body);
	
// 	burhanii_support
	$conn = mysqli_connect ( "localhost", "burhanii_support", "bito@)!^", "burhanii_support" );
	
	if (! $conn->query ( $query )) {
		$msg = "Error - " . $conn->error;
		$clearData = false;
	} else {
		$msg = "Your request has been recieved. We will get back to you in short.";
	}
	
	$conn->close();
}

/**
 * Call this method to get single instance of class.
 *
 * @return Paths
 */
function sendEmail($email, $fullName, $subject, $body) {
	include_once 'finance/lib/email/class.phpmailer.php';
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

	if (! $mail->Send ()) {
		return false;
	} else {
		return true;
	}
}


if( $clearData ) {
	$name = "";
	$its = "";
	$mohalla = "";
	$address = "";
	$mobile = "";
	$email = "";
	$school = "";
	$standard = "";
	$board = "";
	$madrasa = "";
	$paymentCycle = "";
	$totalRequired = "";
	$ownPart = "";
	$trustPart = "";
	$fatherOccupation = "";
	$motherOccupation = "";
	$appliedAnywhere = "";
	$remarks = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>BITF - Inayat request</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
 
 <style type="text/css">
 .label {
  width:100px;
  text-align:right;
  float:left;
  padding-right:10px;
  font-weight:bold;
}
#register-form label.error {
  color:#FB3A3A;
  font-weight:bold;
}
h1 {
  font-family: Helvetica;
  font-weight: 100;
  color:#333;
  padding-bottom:20px;
}
</style>
 
<script>
  $(function() {
    $("#register-form").validate({
        // Specify the validation rules
        rules: {
            name: {
            	required: true,
            	minlength: 5,
            	maxlength: 255,
            },
            its: {
            	required: true,
            	number: true,
            	minlength: 8,
            	maxlength: 8,
            },
            email: {
                required: true,
                minlength: 8,
            	maxlength: 250,
                email: true
            },
            mohalla: "required",
            address: {
                required: true,
                minlength: 8,
            	maxlength: 250,
            },
            mobile: {
                required: true,
                minlength: 10,
            	maxlength: 10,
                number: true
            },
            school: {
                required: true,
                minlength: 1,
            	maxlength: 250,
            },
            standard: {
                required: true,
                minlength: 1,
            	maxlength: 250,
            },
            board: "required",
            madrasa: "required",
            paymentCycle: "required",
            totalRequired: {
                required: true,
                minlength: 1,
            	maxlength: 8,
                number: true
            },
            ownPart: {
                required: true,
                minlength: 1,
            	maxlength: 8,
                number: true
            },
            trustPart: {
                required: true,
                minlength: 1,
            	maxlength: 8,
                number: true
            },
            fatherOccupation: {
                required: true,
                minlength: 1,
            	maxlength: 250,
            },
            motherOccupation: {
                required: true,
                minlength: 1,
            	maxlength: 250,
            },
            appliedAnywhere: "required",
            /*remarks: {
                required: true,
                minlength: 1,
            	maxlength: 500,
            }*/
        },
        
        // Specify the validation error messages
        messages: {
        	name: {
            	required: "Please enter full name.",
            	minlength: "minimum 5 character.",
            	maxlength: "maximum 255 character.",
            },
            its: {
            	required: "Please enter ITS ID.",
            	number: "Enter numbers only.",
            	minlength: "minimum 8 character.",
            	maxlength: "maximum 8 character.",
            },
            email: {
            	required: "Please enter Email.",
            	minlength: "minimum 5 character.",
            	maxlength: "maximum 255 character.",
                email: "Please correct email format."
            },
            mohalla: "Please select one.",
            address: {
            	required: "Please enter address.",
            	minlength: "minimum 5 character.",
            	maxlength: "maximum 500 character.",
            },
            mobile: {
            	required: "Please enter mobile number.",
            	minlength: "minimum 10 character.",
            	maxlength: "maximum 10 character.",
                number: "Enter numbers only."
            },
            school: {
            	required: "Please enter school name.",
            	minlength: "minimum 2 character.",
            	maxlength: "maximum 250 character.",
            },
            standard: {
            	required: "Please enter class standard.",
            	minlength: "minimum 1 character.",
            	maxlength: "maximum 250 character.",
            },
            board: "Please select one.",
            madrasa: "Please select one.",
            paymentCycle: "Please select one.",
            totalRequired: {
            	required: "Please enter amount requirement.",
            	minlength: "minimum 1 character.",
            	maxlength: "maximum 8 character.",
                number: "Enter numbers only."
            },
            ownPart: {
            	required: "Please enter your contribution.",
            	minlength: "minimum 1 character.",
            	maxlength: "maximum 8 character.",
                number: "Enter numbers only."
            },
            trustPart: {
            	required: "Please enter expectation from trust.",
            	minlength: "minimum 1 character.",
            	maxlength: "maximum 8 character.",
                number: "Enter numbers only."
            },
            fatherOccupation: {
            	required: "Please enter father's occupation.",
            	minlength: "minimum 1 character.",
            	maxlength: "maximum 255 character.",
            },
            motherOccupation: {
            	required: "Please enter mother's occupation.",
            	minlength: "minimum 1 character.",
            	maxlength: "maximum 255 character.",
            },
            appliedAnywhere: "Please select one.",
            /*remarks: {
                required: true,
                minlength: 1,
            	maxlength: 500,
            }*/
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>  
</head>
<body>

      <div class="jumbotron container">
<nav class="navbar navbar-default">
        <div class="navbar-header">
          <a href="http://burhaniit.org"><img class="img-responsive" src="http://burhaniit.org/wp-content/uploads/2016/04/burhani-logo-1.png" alt="Burhani IT Fraternity"></a>
        </div>
    </nav>
<div class="alert alert-info" role="alert">We feel it is our duty to ensure that our mumineen brothers and sisters get all necessary assistance to turn their dreams into reality.  Burhani IT Fraternity (BITF) is devoted towards providing assistance (motivation, financial and guidance) to mumineen across Pune. </div>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3>Request for education support</h3>
  </div>
  <div class="panel-body">



		<?php if($msgRef) { ?>
			<div class="alert alert-warning">
			  <strong>Success!</strong> <?php echo $msg; ?>
			</div>
			
		<?php } ?>
		<form id="register-form" role="form" action="" method="post">
			<div class="form-group">
				<label for="name">Student Name:</label> <input type="text"
					class="form-control" name="name" placeholder="Enter name" value="<?php echo $name; ?>" required>
			</div>
			<div class="form-group">
				<label for="its">Student ITS:</label> <input type="text"
					class="form-control" name="its" placeholder="Enter ITS ID" value="<?php echo $its; ?>" size=8 required>
			</div>
			<div class="form-group">
				<label for="mohalla">Mohalla:</label> <select class="form-control"
					name="mohalla">
					<option value="">Select....</option>
					<option value="Saifee">Saifee</option>
					<option value="Burhani">Burhani</option>
					<option value="Fakhri">Fakhri</option>
					<option value="Mohammedi">Mohammedi</option>
					<option value="Kasarwadi">Kasarwadi</option>
					<option value="Burhani_Colony">Burhani Colony</option>
					<option value="Burhani_Park">Burhani Park</option>
					<option value="Fatema_Nagar">Fatema Nagar</option>
					<option value="out_of_puna">Out of Pune</option>
				</select>
			</div>
			<div class="form-group">
				<label for="address">Present Address:</label>
				<textarea rows="10" cols="35" class="form-control" name="address"><?php echo $address; ?></textarea>
			</div>
			<div class="form-group">
				<label for="mobile">Mobile:</label> <input type="text"
					class="form-control" name="mobile"  value="<?php echo $mobile; ?>" placeholder="Enter mobile number">
			</div>
			<div class="form-group">
				<label for="email">Email:</label> <input type="email"
					class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Enter email">
			</div>
			<div class="form-group">
				<label for="school">School:</label> <input type="text"
					class="form-control" name="school" value="<?php echo $school; ?>" placeholder="Enter school name">
			</div>
			<div class="form-group">
				<label for="standard">Standard:</label> <input type="text"
					class="form-control" name="standard" value="<?php echo $standard; ?>" placeholder="Enter Standard">
			</div>
			<div class="form-group">
				<label for="board">Examination Board:</label> <select
					class="form-control" name="board">
					<option value="">Select....</option>
					<option value="SSC">SSC</option>
					<option value="CBSE">CBSE</option>
					<option value="ICSE">ICSE</option>
					<option value="Other">Other</option>
				</select>
			</div>
			<div class="form-group">
				<label for="madrasa">Madrasa:</label> <select class="form-control"
					name="madrasa">
					<option value="">Select....</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>
			</div>
			<div class="form-group">
				<label for="paymentCycle">School Payment cycle:</label> <select class="form-control"
					name="paymentCycle">
					<option value="Monthly">Monthly</option>
					<option value="Quarterly">Quarterly</option>
					<option value="half-yearly">Half-Yearly</option>
					<option value="Yearly">Yearly</option>
				</select>

			</div>
			<div class="form-group">
				<label for="totalRequired">Total School Fees:</label> <input type="text"
					class="form-control" name="totalRequired" value="<?php echo $totalRequired; ?>" placeholder="Required fees">
			</div>
			<div class="form-group">
				<label for="ownPart">Your Contribution:</label> <input type="text"
					class="form-control" name="ownPart" value="<?php echo $ownPart; ?>" placeholder="Enter your contribution">
			</div>
			<div class="form-group">
				<label for="trustPart">Expected contribution from trust:</label> <input
					type="text" class="form-control" value="<?php echo $trustPart; ?>" name="trustPart"
					placeholder="Enter expected contribution">
			</div>
			<div class="form-group">
				<label for="fatherOccupation">Father's occupation:</label> <input type="text"
					class="form-control" value="<?php echo $fatherOccupation; ?>" name="fatherOccupation"
					placeholder="Enter father's occupation">
			</div>
			<div class="form-group">
				<label for="motherOccupation">Mother's occupation:</label> <input type="text"
					class="form-control" value="<?php echo $motherOccupation; ?>" name="motherOccupation"
					placeholder="Enter mother's occupation">
			</div>
			<div class="form-group">
				<label for="appliedAnywhere">Have you applied for fees anywhere else?:</label>
				<select class="form-control" name="appliedAnywhere">
					<option value="">Select....</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>
			</div>
			<div class="form-group">
				<label for="remarks">Remarks:</label>
				<textarea class="form-control" name="remarks"><?php echo $remarks; ?></textarea>
			</div>
			<button type="submit" class="btn btn-success">Submit</button>
			<a class="btn btn-success" href="http://burhaniit.org">Cancel</a>
		</form>
	</div>


</div>
</div>
</body>
</html>
