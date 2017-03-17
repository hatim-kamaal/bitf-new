<?php
include_once "common.php";

try {
    $conn = getConnection();
    $method = $_SERVER ['REQUEST_METHOD'];
    if ($method === 'POST') {
   $rs = $conn->query ( $_POST["qry"]  );
   if ($rs instanceof mysqli_result) {
       echo "<table border=1 width='100%'>";
        $rowCount = 1;
	while ($row = $rs->fetch_row()) {
           echo "<tr><td>$rowCount</td>";
           $rowCount++;
           $total = count($row);
           for ($i = 0; $i < $total; $i++) {
              echo "<td>" . $row[$i] . "</td>";
           }
           echo "</tr>";
        }

       echo "</table>";
   }
    }
    $conn->close();
    echo "Finished...";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

/*
$query = "DROP TABLE txn_backlog;";
$conn->query ( $query );


$query = "CREATE TABLE txn_backlog(id bigint AUTO_INCREMENT NOT NULL PRIMARY KEY, diwas date NOT NULL, txnref varchar(600) NOT NULL, withdraw int(10) NOT NULL,deposit int(10) NOT NULL);";
//$conn->query ( $query );



$query = "SELECT c.itsid, c.fullname, c.email, c.mobile, SUM(d.amount) as total FROM bitf_contributor c, bitf_donation d WHERE c.itsid = d.itsid AND c.itsid = 30359589 GROUP BY c.itsid, c.fullname, c.email, c.mobile ;";
$rs = $conn->query ( $query );

if ($rs instanceof mysqli_result) {
if (mysqli_num_rows ( $rs ) > 0) {
    foreach ( $rs as $row ) {
     $f_itsid = $row["itsid"];
     $f_name = $row["fullname"];
     $f_email = $row["email"];
     $f_mobile = $row["mobile"];
     $f_total = $row["total"];
     
	echo "$f_name - $f_total";     
    }
}
}
*/

?>

<form action="" method="post">
<textarea name="qry" cols="100" rows=20></textarea><br/>
<input type="submit"/>
</form>
