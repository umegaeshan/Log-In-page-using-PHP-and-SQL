<?php require_once('controle-user-data.php') ;?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up Form</title>
	<link rel="stylesheet" type="text/css" href="sign-up-form.css">
</head>
<body>


<div class="container">

	<div class="form">
		
		<h1> Signup Form</h1>

			<p class="head_para"> it's quick and easy </p>

<form action="login-user.php" method="POST">			 

		
			<div class="input_boxes">

				<input type="text" name="fullname" placeholder="Full Name "><br>

				<input type="email" name="email" placeholder="Email Address "><br>

				<input type="password" name="password" placeholder="Password "><br>

				
			</div>

			<div class="btn">
				<input type="submit" name="signup" value="Sign Up">
			</div>

			<div class="footer_para">
				Already a member ? 
				<a href="login-user.php"> Login Here </a>
			</div>

	</div>
</div>
</form>

</body>
</html>