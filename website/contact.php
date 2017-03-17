<?php
include_once "header.php";
?>

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
            email: {
                required: true,
                minlength: 8,
            	maxlength: 250,
                email: true
            },
            mobile: {
                required: true,
                minlength: 10,
            	maxlength: 10,
                number: true
            },
            subject: {
                required: true,
                minlength: 1,
            	maxlength: 250,
            },
            message: {
                required: true,
                minlength: 1,
            	maxlength: 500,
            }
        },
        
        // Specify the validation error messages
        messages: {
        	name: {
            	required: "Please enter full name.",
            	minlength: "minimum 5 character.",
            	maxlength: "maximum 255 character.",
            },
            email: {
            	required: "Please enter Email.",
            	minlength: "minimum 5 character.",
            	maxlength: "maximum 255 character.",
                email: "Please correct email format."
            },
            mobile: {
            	required: "Please enter mobile number.",
            	minlength: "minimum 10 character.",
            	maxlength: "maximum 10 character.",
                number: "Enter numbers only."
            },
            subject: {
            	required: "Please enter email subject.",
            	minlength: "minimum 2 character.",
            	maxlength: "maximum 250 character.",
            },
            message: {
            	required: "Please enter your message.",
            	minlength: "minimum 2 character.",
            	maxlength: "maximum 500 character.",
            },
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>  
<div class="panel panel-info">
	<div class="panel-heading">
		<h1>Contact</h1>
	</div>
	<div class="panel-body">
		<img class="img-responsive center-block"
			src="static/img/team-help-03.png"> <br />

		<div class="row">
			<div class="col-md-4">
				Call: +91-9923702152 / +91-7709055222<br /> Email:
				educare@burhaniit.org
			</div>
			<div class="col-md-8">
				<?php if($msgRef) { ?>
				<div class="alert alert-warning">
					<strong>Success!</strong>
					<?php echo $msg; ?>
				</div>

				<?php } ?>
				<form id="register-form" role="form" action="" method="post">
					<div class="form-group">
						<label for="name">Your Name:</label> <input type="text"
							class="form-control" name="name" placeholder="Enter name"
							value="<?php echo $name; ?>" required>
					</div>
					<div class="form-group">
						<label for="mobile">Mobile No:</label> <input type="text"
							class="form-control" name="mobile" value="<?php echo $mobile; ?>"
							placeholder="Enter mobile number">
					</div>
					<div class="form-group">
						<label for="email">Email:</label> <input type="email"
							class="form-control" name="email" value="<?php echo $email; ?>"
							placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="school">Subject:</label> <input type="text"
							class="form-control" name="subject" value="<?php echo $school; ?>"
							placeholder="Enter school name">
					</div>
					<div class="form-group">
						<label for="message">Message:</label>
						<textarea class="form-control" name="message"><?php echo $remarks; ?></textarea>
					</div>
					<button type="submit" class="btn btn-success">Submit</button>
				</form>
			</div>
		</div>

	</div>
</div>

<?php
include_once "footer.php";
?>