<?php
include_once "common.php";
$errmsg = "";
$method = $_SERVER ['REQUEST_METHOD'];
if ($method === 'POST') {
   $uid = $_POST["User"];  
   $pwd = $_POST["Passcode"]; 
   
	$query = "SELECT itsid, fullname, email, mobile FROM BITF_TICKET_USER WHERE itsid = $uid AND secretcode = '$pwd'";
	$conn = getConnection();
	$rs = $conn->query ( $query );
	
	if ($rs instanceof mysqli_result) {
		if (mysqli_num_rows ( $rs ) > 0) {
		    $row = mysqli_fetch_row($rs);
		    $user = array("itsid"=>$row[0],"fullname"=>$row[1],"email"=>$row[2],'mobile'=>$row[3]);	       
			setSession("USER_SESSION", $user);
            Header("Location: ticketlist.php");
		} else {
			$errmsg = "Invalid credentials.";
		}
	} else {
		$errmsg = "System error.";
	}
   
} else if( isset( $_GET["logout"] ) ) {
   removeSession("USER_SESSION");
}

include_once 'header.php';
?>


<div class="row">
	<div class="col-md-4 col-md-offset-4">
<form id="Form1" method="post" action="" id="ctl01" role="form"
	class="form-horizontal minHt">


	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Login Area</h3>
		</div>
		<div class="panel-body">

		<?php if( strlen( $errmsg ) > 0) { ?>
			<div class="form-group">
				<div class="alert alert-warning">
				<?php echo $errmsg; ?>
				</div>
			</div>
		<?php } ?>
		
		
			<div class="form-group">
				<div class="col-sm-12">
					<input name="User" type="text" placeholder="ITS ID"
						class="form-control input-lg" />
				</div>

			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<input name="Passcode" id="Passcode" type="password"
						placeholder="Password" 
						class="form-control input-lg" />
				</div>

			</div>
			<div class="form-group">
				<div class="col-sm-12" align="right">
					<button type="submit" name="ACTION_REFERENCE" value="Login"
						class="btn btn-primary form-control input-lg">Login</button>
				</div>
			</div>
		</div>

	</div>
</form>
</div>
</div>
<script type="text/javascript">
$(function() {
	// Setup form validation on the #register-form element
	$("#Form1").validate(
	{
		// Specify the validation rules
		rules : {
			User : {
				required : true,
				number: true,
				minlength : 8,
				maxlength : 8,
			},
			Passcode : {
				required : true,
				minlength : 2,
			}
		},
		submitHandler : function(form) {
			form.submit();
		}
	});
});


</script>

<?php include_once 'footer.php' ?>
