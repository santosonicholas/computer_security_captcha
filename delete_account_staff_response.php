<?php

include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();


if (isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM staff WHERE id = $id";
    $query = mysqli_query($connString,$sql);
    $_SESSION['delete_staff_success'] = "You've deleted $id's account";
    header("Location:assign_roles_details.php");
}

?>