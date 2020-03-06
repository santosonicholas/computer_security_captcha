<?php

include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();
$sess_roles = $_SESSION['roles'];
$sess_username  =$_SESSION['username'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$username = $_SESSION['username'];
$roles = $_SESSION['roles'];
$id = $_SESSION['id'];
$query = "SELECT * FROM user";
$result = mysqli_query($connString, $query);

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
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/main_table.css">
<!--===============================================================================================-->
</head>
<body>
<?php
    echo "<button><a href='home.php?id=$id'><i class='zmdi zmdi-home zmdi-hc-4x'></i></a></button>
	"?>
	<h4>Hello <?php echo "$sess_username"; ?>, You're login as <?php if ($sess_roles=="su"){
                            echo "a (Super User)";
                        } elseif ($sess_roles=="adm"){
                            echo "an (Administrator)";
                        }elseif ($sess_roles=="ed"){
                            echo "an (Editor)";
                        }elseif ($sess_roles=="ro"){
                            echo "a (Member)";
                        }?></h4>    
	<div class="mt-5">
		<div class="container-fluid">
			<div class="row">
				<?php 
					if(isset($_SESSION['add_account_success'])){
						$msg = $_SESSION['add_account_success'];
						echo "<span style='color:green'>$msg<span>";
						unset($_SESSION['add_account_success']);
					}
					if(isset($_SESSION['edit_other_success'])){
						$msg = $_SESSION['edit_other_success'];
						echo "<span style='color:green'>$msg<span>";
						unset($_SESSION['edit_other_success']);
					}
					if(isset($_SESSION['delete_member_success'])){
						$msg = $_SESSION['delete_member_success'];
						echo "<span style='color:green'>$msg<span>";
						unset($_SESSION['delete_member_success']);
					}
				?><br><br>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1>Account List</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<br>
					<button type="button" class="btn btn-primary"><a href="add_account_member.php"><h5 style="color:white">Add an Account</h5></a></button>
				</div>
			</div>
			<div class="row">
					<div class="container-table100">
						<div class="wrap-table100">
							<div class="table100 ver1 m-b-110">
								<div class="table100-head">
									<table>
										<thead>
											<tr class="row-100 head">
												<th class="cell100 column1">Id</th>
												<th class="cell100 column2">First Name</th>
												<th class="cell100 column3">Last Name</th>
												<th class="cell100 column4">Username</th>
												<th class="cell100 column5">Email</th>
												<th class="cell100 column6">Password</th>
												<th class="cell100 column7">Gender</th>
												<th class="cell100 column8">Actions</th>
											</tr>
										</thead>
									</table>
								</div>
								<div class="table100-body js-pscroll">
									<table>
										<tbody>
											<?php
											while ($row = mysqli_fetch_array($result)){
												$id_account = $row['id'];
												$first_name = $row['first_name'];
												$last_name = $row['last_name'];
												$username = $row['username'];
												$email = $row['email'];
												$password = $row['password'];
												$gender = $row['gender'];
												echo "
												<tr class='row100 body'>
													<td class='cell100 column1'>$id_account</td>
													<td class='cell100 column2'>$first_name</td>
													<td class='cell100 column3'>$last_name</td>
													<td class='cell100 column4'>$username</td>
													<td class='cell100 column5'>$email</td>
													<td class='cell100 column6'>$password</td>
													<td class='cell100 column7'>$gender</td>
													<td class='cell100 column8'>
													<button><a href='edit_profile_list_member.php?id=$id_account'><i class='zmdi zmdi-edit zmdi-hc-2x'></i></a></button>
													<button><a href='delete_account_member.php?id=$id_account'><i class='zmdi zmdi-delete zmdi-hc-2x'></i></a></button>
													
													

													</td>
												</tr>
											";
											} ?>
											
											
										</tbody>
									</table>

								</div>
								
							</div>
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
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>

</body>
</html>