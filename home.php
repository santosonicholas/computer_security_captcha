
<?php
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

$username = $_SESSION['username'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$sess_id = $_SESSION['id'];


$roles = $_SESSION['roles'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home Captcha</title>
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
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			<?php 
					if(isset($_SESSION['edit_success'])){
						$error = $_SESSION['edit_success'];
						echo "<span style='color:green'>$error<span>";
						unset($_SESSION['edit_success']);
						echo "<br>";
					}
					?>
				<?php 
					if(isset($_SESSION['edit_other_success'])){
						$error = $_SESSION['edit_other_success'];
						echo "<span style='color:green'>$error<span>";
						unset($_SESSION['edit_other_success']);
						echo "<br>";
					}
					?>
					<span class="login100-form-title p-b-26">
						Hello,
					</span>
                    <?php
                        echo "<span class='login100-form-title p-b-48'>";
						if (isset($_GET['id'])){
							$id=$_GET['id'];
							//user
							$query = "SELECT first_name, last_name FROM user WHERE id = $id";
							$result = mysqli_query($connString, $query);
							$row = mysqli_fetch_assoc($result);
							$curr_first_name = $row['first_name'];
							$curr_last_name = $row['last_name'];
							echo "$curr_first_name $curr_last_name";

							//staff
							$query_staff = "SELECT first_name, last_name FROM staff WHERE id = $id";
							$result_staff = mysqli_query($connString, $query_staff);
							$row_staff = mysqli_fetch_assoc($result_staff);
							$curr_first_name_staff = $row_staff['first_name'];
							$curr_last_name_staff = $row_staff['last_name'];
							echo "$curr_first_name_staff $curr_last_name_staff";

							unset($id);
						} elseif(isset($_GET['sess_id'])){ //from edit profile
							//user
							$sess_id=$_GET['id'];
							$query = "SELECT first_name, last_name FROM user WHERE id = $sess_id";
							$result = mysqli_query($connString, $query);
							$row = mysqli_fetch_assoc($result);
							$curr_first_name = $row['first_name'];
							$curr_last_name = $row['last_name'];
							echo "$curr_first_name $curr_last_name";

							//staff
							$query_staff = "SELECT first_name, last_name FROM staff WHERE id = $sess_id";
							$result_staff = mysqli_query($connString, $query_staff);
							$row_staff = mysqli_fetch_assoc($result_staff);
							$curr_first_name_staff = $row_staff['first_name'];
							$curr_last_name_staff = $row_staff['last_name'];
							echo "$curr_first_name_staff $curr_last_name_staff";
							unset($sess_id);
						} else {
							echo "$first_name $last_name";
						}
						echo"</span>";
						if ($roles=="su"){
                            echo "<span class='login100-form-title p-b-48'>You are a <br>Super User</span>";
                        } elseif ($roles=="adm"){
                            echo "<span class='login100-form-title p-b-48'>You are an <br>Administrator</span>";
                        }elseif ($roles=="ro"){
                            echo "<span class='login100-form-title p-b-48'>You are a <br>Member</span>";
                        }
					    
                    ?>

					<?php 
					if($roles=="ro"){
						echo "<div class='container-login100-form-btn'>
								<div class='wrap-login100-form-btn'>
									<div class='login100-form-bgbtn'></div>
									<form id='edit_role' action='edit_profile_member.php'>
										<button name='form_submit' class='login100-form-btn'>
										Edit Your Profile
										</button>
									</form>
								</div>
								</div>";
					}
					?>

					<?php
					if($roles=="su" || $roles=="adm"){
						echo "<div class='container-login100-form-btn'>
								<div class='wrap-login100-form-btn'>
									<div class='login100-form-bgbtn'></div>
									<form id='edit_role' action='edit_profile_staff.php'>
										<button name='form_submit' class='login100-form-btn'>
										Edit Your Profile
										</button>
									</form>
								</div>
								</div>";
					}
					?>


					<?php 
					if($roles=="su"){
						echo "<div class='container-login100-form-btn'>
								<div class='wrap-login100-form-btn'>
									<div class='login100-form-bgbtn'></div>
									<form id='edit_role' action='assign_roles_details.php'>
										<button name='form_submit' class='login100-form-btn'>
										Assign Accounts Role
										</button>
									</form>
								</div>
								</div>";
					}
					?>

					<?php 
					if($roles=="su" || $roles=="adm"){
						echo "<div class='container-login100-form-btn'>
								<div class='wrap-login100-form-btn'>
									<div class='login100-form-bgbtn'></div>
									<form id='edit_profile' action='list_account_details.php'>
										<button name='form_submit' class='login100-form-btn'>
										Edit Registered Accounts Profile
										</button>
									</form>
								</div>
								</div>";
					}
					?>
					

                    <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                            <form id="logout" action="logout_response.php">
                                <button name="form_submit" class="login100-form-btn">
                                    Logout
                                </button>
                            </form>
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