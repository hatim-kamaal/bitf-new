<?php
include_once 'common.php';
$auth = false;
if( isLoggedIn() ) {
   $auth = true;
} 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>BITF - Ticket</title>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
		<script src="static/js/jquery-3.1.1.min.js"></script>
		<script src="static/js/jquery.validate.min.1.9.js"></script>
		<script src="static/js/bootstrap.min.3.3.7.js"></script>
		<script src="static/js/jquery.datetimepicker.js"></script>
		<link href="static/css/bootstrap.min.3.3.7.css"
			rel="stylesheet" />
		<link href="static/css/jquery.datetimepicker.css"
			rel="stylesheet" />
		
	<!--		
		<script src="static/common.min.js"></script>
	-->		

</head>
<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".navbar-collapse">
						<span class="sr-only">Navigation</span> <span class="icon-bar"></span>
						<span class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
					<div class="navbar-brand">
						<a href=''>Ticket</a>
					</div>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
                                             <?php if($auth) { ?>
					     <li><a href='requestlist.php'>Request List</a></li>
					     <li><a href='ticketlist.php'>Ticket List</a></li>
					     <li><a href='addticket.php'>Add Ticket</a></li>
					     <li><a href='login.php?logout=true'>Logout</a></li>
                                             <?php } else { ?>
					     <li><a href='login.php'>Login</a></li>
                                             <?php } ?>
			                </ul>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
			