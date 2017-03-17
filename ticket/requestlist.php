<?php

include_once "common.php";

if( !isLoggedIn() ) {
   header("Location: login.php");
} 

$where = " WHERE status = true";
$method = $_SERVER ['REQUEST_METHOD'];
$filter = "open";
if ($method === 'GET' && isset( $_GET["s"] )) {
	switch( $_GET["s"] ) {
	case 'close':
		$filter = 'close';
        $where = " WHERE status = false";
	    break;
	case 'any':
	    $filter = "any";
		$where = "";	   
	    break;
	} 
}

$conn = getConnection();
include_once 'header.php';
?>

<div class="panel panel-primary">
	<div class="panel-body">
	<ul class="nav nav-pills">
	  <li role="presentation" <?php if( $filter === 'open' ) echo "class='active'" ?> ><a href="requestlist.php?s=open">Open</a></li>
	  <li role="presentation" <?php if( $filter === 'close' ) echo "class='active'" ?>><a href="requestlist.php?s=close">Close</a></li>
	  <li role="presentation" <?php if( $filter === 'any' ) echo "class='active'" ?>><a href="requestlist.php?s=any">Any</a></li>
	</ul>
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Request List</h3>
	</div>
	<div class="panel-body">
<table  class='table table-striped' border=1 width='100%'>
<tr><th>S/No</th><th>Name</th><th>Email</th><th>Mobile</th><th>Remarks</th><th>Status</th></tr>
<?php
   $query = "SELECT id, name, email, mobile, remarks, status FROM BITF_TICKET_REQUEST $where;";
   $rs = $conn->query ( $query );

   if ($rs instanceof mysqli_result) {
	if (mysqli_num_rows ( $rs ) > 0) {
		$counter = 0;	    
		foreach ( $rs as $row ) {
             $fullname = $row["name"];
             $email = $row["email"];
             $mobile = $row["mobile"];
             $remarks = $row["remarks"];
             $status = $row["status"];
             
			$counter++;
             echo "<tr>";
             echo "<td>$counter</td>";
             echo "<td>$fullname</td>";
             echo "<td>$email</td>";
             echo "<td>$mobile</td>";
             echo "<td>$remarks</td>";
             echo "<td>" . ($status ? 'Open' : 'Close') . "</td>";
             //echo "<td><a href='adddonation.php?ITSID=$itsid'>Add Donation</a></td>";
             echo "</tr>";
            }
        } else {
             echo "<tr>";
             echo "<td>No data found....</td>";
             echo "</tr>";
        }
       echo "</table>";
   }
?>

	</div>
</div>

<?php   
include_once 'footer.php';
     $conn->close();
?>