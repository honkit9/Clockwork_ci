
<html>
<head><title>Reset Password</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url().'assets/css/password.css'?>" />

</head>

<body>

<div style="margin:0 auto;	border:1px solid #ddd;	border-radius:10px; width:400px; padding:0px">

	<div id="login-title">
		<h4 style="margin:0px; padding:12px 40px; color:blue; font-family:Arial;">Reset Password</h4>
	</div>

	<div id="login-form">
		<form name="passwordfrm" method="post" action="<?=base_url().'admin/login/forgotpw_post'?>">
			<p><input type="email" name="email" placeholder="Email" required /></p>
			<p><input type="submit" name="sendbtn" value="Get Code" /></p>
		</form>
	</div>


</div>


</body>

</html>
