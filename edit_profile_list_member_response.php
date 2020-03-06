<?php

include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();
$sess_id = $_SESSION['id'];
$sess_roles = $_SESSION['roles'];

$username = $_SESSION['username'];

$edit_success = "Edit Profile Success";


if(isset($_POST['form_submit'])) {
    if ($sess_roles=="su" || $sess_roles=="adm"){
        
        if(isset($_POST['id'])){
            $id = mysqli_real_escape_string($connString, trim($_POST['id']));
            $first_name = mysqli_real_escape_string($connString, trim($_POST['first_name']));
            $last_name = mysqli_real_escape_string($connString, trim($_POST['last_name']));
            $password = mysqli_real_escape_string($connString, trim($_POST['password']));
            $email = mysqli_real_escape_string($connString, trim($_POST['email']));
            $username = mysqli_real_escape_string($connString, trim($_POST['username']));
            $encrypted_password = md5($password);
            $sql = "UPDATE user SET first_name = '$first_name', last_name = '$last_name', password='$encrypted_password', email='$email', username='$username' WHERE id = $id";
            $resultset = mysqli_query($connString, $sql) or die("database error:". mysqli_error($connString));
            $_SESSION['edit_other_success'] = "You've just updated $id's Profile";
            unset($id);
            header("Location: list_account_details.php");

        }
       
    }
  
}
?>