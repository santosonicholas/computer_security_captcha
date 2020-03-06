<?php

include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();
$sess_id = $_SESSION['id'];
$sess_roles = $_SESSION['roles'];

$username = $_SESSION['username'];

$edit_success = "Edit Profile Success";


if(isset($_POST['form_submit'])) {
        $id_staff = mysqli_real_escape_string($connString, trim($_POST['id']));
        $first_name_staff = mysqli_real_escape_string($connString, trim($_POST['first_name']));
        $last_name_staff = mysqli_real_escape_string($connString, trim($_POST['last_name']));
        $username_staff = mysqli_real_escape_string($connString, trim($_POST['username']));
        $email_staff = mysqli_real_escape_string($connString, trim($_POST['email']));
        $password_staff = mysqli_real_escape_string($connString, trim($_POST['password']));
        $encrypted_password_staff = md5($password_staff);
        $sql_staff = "UPDATE staff SET first_name = '$first_name_staff', last_name = '$last_name_staff', username='$username_staff', email='$email_staff', password='$encrypted_password_staff' WHERE id = $id_staff";
        $resultset_staff = mysqli_query($connString, $sql_staff) or die("database error:". mysqli_error($connString));
        $_SESSION['edit_other_success'] = "You've just updated your profile";
        $_SESSION['first_name'] = $first_name_staff;
        $_SESSION['last_name'] = $last_name_staff;
        header("Location: home.php");

        }

?>