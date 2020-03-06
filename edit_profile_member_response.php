<?php

include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();
$sess_id = $_SESSION['id'];
$sess_roles = $_SESSION['roles'];

$username = $_SESSION['username'];

$edit_success = "Edit Profile Success";


if(isset($_POST['form_submit'])) {

    $first_name = mysqli_real_escape_string($connString, trim($_POST['first_name']));
    $last_name = mysqli_real_escape_string($connString, trim($_POST['last_name']));
    $id = mysqli_real_escape_string($connString, trim($_POST['id']));
    $sql = "UPDATE user SET first_name = '$first_name', last_name = '$last_name' WHERE id = $id";
    $resultset = mysqli_query($connString, $sql) or die("database error:". mysqli_error($connString));
    $_SESSION['edit_success'] = "You've just updated your profile";
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    header("Location: home.php?id=$sess_id");   

    }

?>