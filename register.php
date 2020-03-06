

<?php
session_start();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
    <div>
		<button><a href="index.php"><i class="zmdi zmdi-home zmdi-hc-4x"></i></a></button>
	</div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action ="register_response.php" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Register an Account
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-graduation-cap"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "input your username here">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
                        <?php
                        if(isset($_SESSION['username_taken'])){
                            $error = $_SESSION['username_taken'];
                            echo "<span style='color:red'>$error<span>";
                            unset($_SESSION['username_taken']);
                        }
                        ?>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "input your first name here">
						<input class="input100" type="text" name="first_name">
						<span class="focus-input100" data-placeholder="First Name"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "input your last name here">
						<input class="input100" type="text" name="last_name">
						<span class="focus-input100" data-placeholder="Last Name"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
                        <?php
                        
                        if(isset($_SESSION['password_invalid'])){
                            $error = $_SESSION['password_invalid'];
                            echo "<span style='color:red'>$error<span>";
                            unset($_SESSION['password_invalid']);
                        }
                        ?>
					</div>

                    <div>
					Gender<br>
                        <input type="radio" name="gender" value="male" required>Male
                        <input type="radio" name="gender" value="female" required>Female
                    </div>
                    <br>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
                        <?php
                        if(isset($_SESSION['email_taken'])){
                            $error = $_SESSION['email_taken'];
                            echo "<span style='color:red'>$error<span>";
                            unset($_SESSION['email_taken']);
                        }
                        ?>
					</div>

                    <?php
                        echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
                        $code = $_SESSION['code'];  
                        //print $code;
                    ?>
                    <br><br><br>
                    <div class="wrap-input100 validate-input" data-validate = "Input captcha here">
						<input class="input100" type="text" name="captcha">
						<span class="focus-input100" data-placeholder="Captcha"></span>
                        <?php        
                        if(isset($_SESSION['captcha_error'])){
                            $error = $_SESSION['captcha_error'];
                            echo "<span style='color:red'>$error<span>";
                            unset($_SESSION['captcha_error']);
                        }
                        ?>
					</div>

                    

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button name="form_submit" class="login100-form-btn">
								Submit
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>