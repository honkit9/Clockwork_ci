<html>
<head>
	<title>Registration User</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/4.4/examples/sign-in/signin.css">
	<style type="text/css">
		body {
			font-family: Times New Roman;
			background-color: gray;
			background-image: url('http://localhost/Clockwork/images/tulips.jpg');
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment: fixed;
			font-size: 18px;
		}

		* {
			box-sizing: border-box;
		}

		#registration {
			padding: 20px;
			background-color: white;
		}

		#registration img {
			width: 70px;
			height: 40px;
			float: right;
		}

		#registration input[type=text], input[type=password], input[type=email] {
			width: 100%;
			padding: 15px;
			margin: 5px 0 22px 0;
			display: inline-block;
			border: none;
			background: #f1f1f1;
		}

		#registration input[type=submit] {
			background-color: rgba(255, 0, 0, 0.6);
			color: white;
			padding: 16px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
			opacity: 0.9;
		}

		#registration input[type=submit]:hover {
			opacity: 1;
		}

		#registration p a {
			color: dodgerblue;
		}

		#registration p a:hover {
			color: red;
		}

		#message {
			display: none;
			background: #f1f1f1;
			color: #000;
			position: relative;
			padding: 20px;
			margin-top: 10px;
		}

		#message p {
			padding: 10px 35px;
			font-size: 18px;
		}

		/* Add a green text color and a checkmark when the requirements are right */
		.valid {
			color: green;
		}

		.valid:before {
			position: relative;
			left: -35px;
			content: "✔";
		}

		/* Add a red text color and an "x" when the requirements are wrong */
		.invalid {
			color: red;
		}

		.invalid:before {
			position: relative;
			left: -35px;
			content: "✖";
		}

	</style>
</head>
<body>

<div style="margin:0 auto;	border:1px solid #ddd;	border-radius:10px; width:450px; padding:0px">

	<form name="registrationfrm" method="post" action="<?= base_url() . 'admin/login/register_post' ?>">
		<div id="registration">
			<h1>Registration User</h1>
			<?php

			if (isset($error)) {
				if ($error != "NO_ERROR") {
					echo '<div class="alert alert-danger" role="alert">';
					echo "$error";
					echo '</div>';
				}
			}

			?>
			<p>Please fill up the information below.</p>
			<hr>

			<p><b>Name</b></p>
			<input type="text" placeholder="Enter Name" name="name"/>


			<p><b>Phone Number</b></p>
			<input type="text" class="input" placeholder="Enter Phone Number" name="phone" data-mask="000-0000 0000"/>

			<p><b>Email</b></p>
			<input type="email" placeholder="Enter Email" name="email"/>

			<p><b>Password</b></p>
			<input type="password" placeholder="Enter Password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
			<div id="message">
				<h3>Password must contain the following:</h3>
				<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
				<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
				<p id="number" class="invalid">A <b>number</b></p>
				<p id="length" class="invalid">Minimum <b>8 characters</b></p>
			</div>

			<p><b>Repeat Password</b></p>
			<input type="password" placeholder="Repeat Password" name="rep_password"/>

			<input type="submit" name="registerbtn" value="Register"/>

			<p>Already have an account? <a href="<?= base_url() . 'admin/login/' ?>">Sign in</a>.</p>
		</div>
	</form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


<!--<script>-->
<!--	var myInput = document.getElementById("psw");-->
<!--	var letter = document.getElementById("letter");-->
<!--	var capital = document.getElementById("capital");-->
<!--	var number = document.getElementById("number");-->
<!--	var length = document.getElementById("length");-->
<!---->
<!--	// When the user clicks on the password field, show the message box-->
<!--	myInput.onfocus = function() {-->
<!--		document.getElementById("message").style.display = "block";-->
<!--	}-->
<!---->
<!--	// When the user clicks outside of the password field, hide the message box-->
<!--	myInput.onblur = function() {-->
<!--		document.getElementById("message").style.display = "none";-->
<!--	}-->
<!---->
<!--	// When the user starts to type something inside the password field-->
<!--	myInput.onkeyup = function() {-->
<!--		// Validate lowercase letters-->
<!--		var lowerCaseLetters = /[a-z]/g;-->
<!--		if(myInput.value.match(lowerCaseLetters)) {-->
<!--			letter.classList.remove("invalid");-->
<!--			letter.classList.add("valid");-->
<!--		} else {-->
<!--			letter.classList.remove("valid");-->
<!--			letter.classList.add("invalid");-->
<!--		}-->
<!---->
<!--		// Validate capital letters-->
<!--		var upperCaseLetters = /[A-Z]/g;-->
<!--		if(myInput.value.match(upperCaseLetters)) {-->
<!--			capital.classList.remove("invalid");-->
<!--			capital.classList.add("valid");-->
<!--		} else {-->
<!--			capital.classList.remove("valid");-->
<!--			capital.classList.add("invalid");-->
<!--		}-->
<!---->
<!--		// Validate numbers-->
<!--		var numbers = /[0-9]/g;-->
<!--		if(myInput.value.match(numbers)) {-->
<!--			number.classList.remove("invalid");-->
<!--			number.classList.add("valid");-->
<!--		} else {-->
<!--			number.classList.remove("valid");-->
<!--			number.classList.add("invalid");-->
<!--		}-->
<!---->
<!--		// Validate length-->
<!--		if(myInput.value.length >= 8) {-->
<!--			length.classList.remove("invalid");-->
<!--			length.classList.add("valid");-->
<!--		} else {-->
<!--			length.classList.remove("valid");-->
<!--			length.classList.add("invalid");-->
<!--		}-->
<!--	}-->
<!---->
<!--</script>-->

</body>
</html>

