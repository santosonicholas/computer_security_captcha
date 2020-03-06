<?php

include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();
$sess_id = $_SESSION['id'];
$sess_roles = $_SESSION['roles'];
$sess_username  =$_SESSION['username'];






$sess_first_name = $_SESSION['first_name'];
$sess_last_name = $_SESSION['last_name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Captcha Group 1</title>
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
    <?php
     echo "<button><a href='home.php?id=$sess_id'><i class='zmdi zmdi-home zmdi-hc-4x'></i></a></button>
     "?>
	</div>
	<div class="limiter">

	<h4>Hello <?php echo "$sess_username"; ?>, You're login as <?php if ($sess_roles=="su"){
                            echo "a (Super User)";
                        } elseif ($sess_roles=="adm"){
                            echo "an (Administrator)";
                        }elseif ($sess_roles=="ro"){
                            echo "a (Member)";
                        }?></h4>    
		<div class="container-login100">
			<div class="wrap-login100">

						<?php 
			if ($sess_roles=='ro'){
			
					echo"
					<form action ='edit_profile_member_response.php' method='POST' class='login100-form validate-form'>";							
									$query = "SELECT * FROM user WHERE id=$sess_id";
									$result = mysqli_query($connString, $query);
									$row = mysqli_fetch_assoc($result);						
									$username = $row['username'];
									$first_name = $row['first_name'];
									$last_name = $row['last_name'];
									$roles = $row['roles'];
									$email = $row['email'];
									$password = $row['password'];
									$id = $row['id'];
	
									if ($roles=='su'){
										$roles='Super User';
									} elseif ($roles=='adm'){
										$roles='Administrator';
									}elseif ($roles=='ro'){
										$roles='Member';
									}
									
								echo"<span class='login100-form-title p-b-26'>
									Edit Profile Page $first_name $last_name 
									($roles)
									</span>
									<div class='wrap-input100 validate-input' data-validate = 'Valid email is: a@b.c'>
									Username
									<input class='input100' type='text' name='username' value='$username' readonly>
									</div>
									<div class='wrap-input100 validate-input' data-validate = 'Valid email is: a@b.c'>
									First Name
									<input class='input100' type='text' name='first_name' value='$first_name'>
								
									</div>
									<div class='wrap-input100 validate-input' data-validate = 'Valid email is: a@b.c'>
										Last Name
										<input class='input100' type='text' name='last_name' value='$last_name'>
									
									</div>
									<div class='wrap-input100 validate-input' data-validate = 'Valid email is: a@b.c'>
										Email
										<input class='input100' type='text' name='email' value='$email' readonly>
										</div>
									
										<input class='input100' type='hidden' name='id' value='$id'>
										
									<div class='container-login100-form-btn'>
							<div class='wrap-login100-form-btn'>
								<div class='login100-form-bgbtn'></div>
								<button name='form_submit' class='login100-form-btn'>
									Submit
								</button>
							</div>
							</div>
						</form>";
									
								}
							
				
			
			
					?>


						
	
                <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                            <?php
                            echo" 
                            <form id='Cancel' action='home.php'>
                                <button name='form_submit' class='login100-form-btn'>
                                    Cancel
                                </button>
                   			</form>";?>
                               
						</div>
				</div>
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