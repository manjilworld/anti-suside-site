<?php
  //phpinfo();
  error_reporting(E_ALL);
  ini_set("display_errors", "1");
?>

<!doctype html>

<html>
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

       <link rel="stylesheet" href="css.css">


	<style>

	body {
  background-color: #6B7A81;
}



	</style>



  </head>

  <body>


          </button>

        </div>


          </ul>

        </div>

      </div>

    </div>


    <div class="container">


        <?php

		$errors = "";

		if (isset($_POST["submit"])) {

		  if (!empty($_POST["firstName"])) {

			$firstName = filter_var($_POST["firstName"],FILTER_SANITIZE_MAGIC_QUOTES);
			if ($firstName=="") {
			  $errors .= "Please enter your first name.<br><br>";
			}

		  }
		  else {

			$errors .= "You forgot to enter your first name.<br><br>";

		  }



		  if (!empty($_POST["lastName"])) {

			$lastName = filter_var($_POST["lastName"],FILTER_SANITIZE_MAGIC_QUOTES);
			if ($lastName=="") {
			  $errors .= "Please enter your last name.<br><br>";
			}

		  }
		  else {

			$errors .= "You forgot to enter your last name.<br><br>";

		  }

		  if (!empty($_POST["emailAddress"])) {

			$emailAddress = filter_var($_POST["emailAddress"],FILTER_SANITIZE_EMAIL);
			if ($emailAddress=="") {
			  $errors .= "Please enter your email address.<br><br>";
			}
			else {
			  if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
			    $errors .= "$emailAddress is not a valid email. Please enter a valid email address.<br><br>";
			  }
			}

		  }
		  else {

			$errors .= "You forgot to enter your email address.<br><br>";

		  }

		  if (!empty($_POST["message"])) {

			$message = filter_var($_POST["message"],FILTER_SANITIZE_MAGIC_QUOTES);

		  }
		  else {

			$errors .= "You forgot to enter a message.<br><br>";

		  }

		  if ($errors) {

		  ?>

		  <div class="alert alert-danger">

			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Error!</strong> The following errors occured:<br><br><?php echo $errors; ?>

		  </div>

		  <?php

		  }

		  else {

		  $from = $emailAddress;
		  $to = "info.liveinpeace@gmail.com";
		  $subject = "Contact Form Submitted";
		  $body = "The following form was submitted by $firstName $lastName.<br><Br>The following message was sent with the contact request:<br><br>$message";
		  $headers = "From: $from";

		  if (mail($to, $subject, $body, $headers)) {

		  ?>

            <div class="alert alert-success">

              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> Your form was submitted! We will be in touch!

            </div>

          <?php

		  }

		  else {

		  ?>

            <div class="alert alert-danger">

              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> There was a problem sending the email! Please try again later.

            </div>

		  <?php
		  }

		  }


		}

		?>
        <form name="myForm" class="form-horizontal" role="form" method="POST" action="#">
        <br><br>
          <div class="form-group">

            <label for="firstName=" class="col-sm-2 control-label"><font face="verdana">First Name:</font></label>

            <div class="col-sm-10">

              <input type="text" name="firstName" class="form-control" required>

            </div>

          </div>

          <div class="form-group">

            <label for="lastName=" class="col-sm-2 control-label"><font face="verdana">Last Name:</font></label>

            <div class="col-sm-10">

              <input type="text" name="lastName" class="form-control" required>

            </div>

          </div>

          <div class="form-group">

            <label for="emailAddress=" class="col-sm-2 control-label"><font face="verdana">Email Address:</font></label>

            <div class="col-sm-10">

              <input type="email" name="emailAddress" class="form-control" required>

            </div>

          </div>

          <div class="form-group">

            <label for="message=" class="col-sm-2 control-label"><font face="verdana">Message:</font></label>

            <div class="col-sm-10">

              <textarea name="message" class="form-control" rows="5" required></textarea>

            </div>

          </div>

          <div class="form-group">

            <div class="col-sm-10 col-sm-offset-2">

              <button type="submit" name="submit" class="btn btn-primary">Submit Form</button>

            </div>

          </div>

        </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

 </body>
</html>
