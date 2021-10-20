
<html>
<head><title>Reset Password</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url().'assets/css/password.css'?>" />

</head>

<body>
<?php
echo form_open('admin/login/forgotpw_post');//to open form
?>
<div style="margin:0 auto;	border:1px solid #ddd;	border-radius:10px; width:400px; padding:0px">

	<div id="login-title">
		<h4 style="margin:0px; padding:12px 40px; color:blue; font-family:Arial;">Reset Password</h4>
	</div>

	<div id="login-form">
		<form name="passwordfrm" method="post">
			<p><input type="email" name="receiver" placeholder="Email" required /></p>
			<p><input type="submit" name="sendbtn" value="Get Code" /></p>
			<?php echo $this->session->flashdata('email_sent'); //display mail fail or send?>
		</form>
	</div>


</div>
<?php
echo form_close();//to close form
?>

</body>

</html>
