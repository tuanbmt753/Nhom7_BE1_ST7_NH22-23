<?php
	session_start();		
		require "../config.php";
		require "../models/db.php";
		require "../models/user.php ";
		// require "models/protypes.php ";
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Register</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="#" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name="username">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name = "password">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name = "password2">
					</div>
					<!-- <div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div> -->
					<div class="form-group">
						<input type="submit" value="Register" class="btn float-right login_btn" name="submit">
					</div>
				</form>
			</div>
			<?php
				$user = new User();
				if(isset($_POST['submit'])){
					$username = $_POST['username'];
					$password = $_POST['password'];
					$password2 = $_POST['password2'];
					$check = 1;
					$getAllLogin = $user->getAllLogin();
					foreach ($getAllLogin as $key => $value) {
						if($username == $value['username']){
							$check = -1;
						}
					}
					if($check == 1 && $password == $password2 && $username != null && $password != null){
						$user->addUser($username,$password,2);?>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							<a href="index.php">log in</a>
						</div>
						<div class="d-flex justify-content-center">
							<span style="color: aqua;">Dang ky thanh cong !</span>
						</div>
					</div>
						<?php
					}
					else{?>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							<a href="index.php">Register</a>
						</div>
						<div class="d-flex justify-content-center">
							<span style="color: aqua;">Dang ky khong thanh cong !</span>
						</div>
					</div>
			<?php
					}
				}
				else{
			?>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							<a href="index.php">log in</a>
						</div>
						<div class="d-flex justify-content-center">
							<a href="#">Forgot your password?</a>
						</div>
					</div>
			<?php
				}
			?>
		
		</div>
	</div>
</div>
</body>
</html>