<?php

include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();


if (isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM user WHERE id = $id";
    $query = mysqli_query($connString,$sql);
    $_SESSION['delete_member_success'] = "You've deleted $id's account";
    header("Location:list_account_details.php");
}

?>