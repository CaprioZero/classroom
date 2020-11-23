<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V11</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="asset/fontawesome-free-5.11.2-web/css/all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form method="POST"  onsubmit="return Validate()" name="vform" >
					<span class="login100-form-title p-b-55">
						Register
					</span>
					<div id="username_div">
						<label>Username</label> <br>
						<input type="text" name="username" class="input100" placeholder="Username">
						<div id="name_error"></div>
					</div>
					<div id="username_div">
						<label>Email</label> <br>
						<input type="email" name="email" class="input100" placeholder="Email">
						<div id="email_error"></div>
					</div>

					<div id="password_div">
						<label>Password</label> <br>
						<input type="password" name="password" class="input100" placeholder="Password">
					</div>
					<div id="pass_confirm_div">
						<label>Password confirm</label> <br>
						<input type="password" name="password_confirm" class="input100" placeholder="password confirm">
						<div id="password_error"></div>
					</div>

					<div class="contact100-form-checkbox m-l-4 m-t-20">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<input type="submit" name="register" value="Login" class="btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="asset/js/main.js"></script>