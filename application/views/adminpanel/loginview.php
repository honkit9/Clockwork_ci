<!DOCTYPE html>
<html>
<head>
	<title>Login User</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/4.4/examples/sign-in/signin.css">
	<style type="text/css">
		body
		{
			font-family: Times New Roman;
			background-color:gray;
			background-image: url('http://localhost/Clockwork/images/LightHouse.jpg');
			background-repeat:no-repeat;
			background-size: cover;
			background-attachment:fixed;
		}

		h4
		{
			margin:0px;
			padding:12px 40px;
			color:red;
			font-size:30px
		}
		#login
		{
			padding:10px;
			text-align:center;
			width: 400px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);

		}

		#login input[type=name], [type=password]
		{
			width:250px;
			border-radius:5px;
			border:1px solid #ddd;
			height:25px;
			padding:5px 10px 5px 40px
		}

		#login input[type=name]
		{
			background-image:url(images/user.png);
			background-repeat:no-repeat;
			background-position:10px 10px;
		}

		#login input[type=password]
		{
			background-image:url(images/key.png);
			background-repeat:no-repeat;
			background-position:10px 10px;
		}

		#login input[type=submit]
		{
			background-color:red;
			width:300px;
			padding:10px;
			color:white;
			border: none;
			cursor: pointer;
			opacity: 0.9;
		}

		#login input[type=submit]:hover
		{
			opacity: 1;
		}

		#login p a
		{
			text-decoration:none;
			text-align:center;
			font-size:1.2em;
			color:yellow;
		}

		#login p a:hover
		{
			color:red;
		}

	</style>

</head>

<body>


<form name="loginfrm" method="post" action="<?= base_url().'admin/login/login_post'?>">

	<div id="login">
		<h4>Login User</h4>
		<p><input class="rounded" type="name" placeholder="Enter Name" name="name" required /></p>
		<p><input type="password" placeholder="Enter Password" name="password" required /></p>
		<p><input  type="submit" name="loginbtn" value="Sign in"/><p>
			<?php

			if ($error != "NO_ERROR") {
				echo '<div class="alert alert-danger" role="alert">';
				echo "$error";
				echo '</div>';
			}

//			if(isset($query)){
//
//				foreach ($query->result_array() as $res){
//					echo $query->num_rows();
//				}
//			}
			?>
		<p><a href="<?php echo base_url().'admin/login/register'?>">If not account. Please register now!</a></p>
		<p><a href="<?php echo base_url().'admin/login/forgotpw'?>">Forgot Password?</a></p>
	</div>

</form>

</body>
<script type="text/javascript">
	<?php
	if (isset($_SESSION['registered'])) {
		if ($_SESSION['registered']=="Yes") {
			# code...
			echo "alert('Register successfully. Please login!');";
		}
		else{
			echo "alert('Register Error!');";
		}
	}
	?>
</script>
</html>
