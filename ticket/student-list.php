<?php

include_once "common.php";

if( !isLoggedIn() ) {
   header("Location: login.php");
} 

$conn = getConnection();
include_once 'header.php';
?>
<table  class='table table-striped' border=1 width='100%'>
<tr><th>S/No</th><th>ITS ID</th><th>Name</th><th>Email</th><th>Mobile</th><th>Donation</th></tr>
<?php
   $query = "SELECT student_name,student_itsid,father_name,mother_name FROM BITF_TICKET_DETAILS;";
   $rs = $conn->query ( $query );

   if ($rs instanceof mysqli_result) {
	if (mysqli_num_rows ( $rs ) > 0) {
$counter = 0;	    
foreach ( $rs as $row ) {
             $itsid = $row["student_name"];
             $fullname = $row["student_itsid"];
             $email = $row["father_name"];
             $mobile = $row["mother_name"];
$counter++;
             echo "<tr>";
             echo "<td>$counter</td>";
             echo "<td><a href='addcontributor.php?itsid=$itsid'>$itsid</a></td>";
             echo "<td>$fullname</td>";
             echo "<td>$email</td>";
             echo "<td>$mobile</td>";
             echo "<td><a href='adddonation.php?ITSID=$itsid'>Add Donation</a></td>";
             echo "</tr>";
            }
        } else {
             echo "<tr>";
             echo "<td>No data found....</td>";
             echo "</tr>";
        }
       echo "</table>";
   }
include_once 'footer.php';
     $conn->close();

?>