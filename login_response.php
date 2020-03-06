<?php
//include connection file 
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();
$email_error = "email incorrect";
$password_error = "password incorrect";
$captcha_error = "captcha incorrect";


unset($_SESSION['email_error']);
unset($_SESSION['password_error']);

if(isset($_POST['form_submit'])) {
    $email = mysqli_real_escape_string($connString, trim($_POST['email']));
    $password = mysqli_real_escape_string($connString, trim($_POST['password']));
    $captcha = mysqli_real_escape_string($connString, trim($_POST['captcha']));

    $sql = "SELECT * FROM user WHERE email='$email'";
    $resultset = mysqli_query($connString, $sql) or die("database error:". mysqli_error($connString));
    $row = mysqli_fetch_assoc($resultset);


    $sql_staff = "SELECT * FROM staff WHERE email='$email'";
    $result_staff = mysqli_query($connString, $sql_staff) or die("database error:". mysqli_error($connString));
    $row_staff = mysqli_fetch_assoc($result_staff);

    if ($row['email'] == $email){
        if($email == $row['email'] && md5($password) == $row['password'] && $captcha == $_SESSION['code']){
            //login success
            $_SESSION['username'] = $row['username'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['roles'] = $row['roles'];
            $flag=0;
            //header("Location: home.php");
        }
        if ($email != $row['email'] ){
            $_SESSION['email_error'] = $email_error;
            $flag=1;
            //header("Location: login1.php");
        }
        if (md5($password) != $row['password']){
            $_SESSION['password_error'] = $password_error;
            $flag=1;
           // header("Location: login1.php");
        }
        if ($captcha != $_SESSION['code']){
            $_SESSION['captcha_error'] = $captcha_error;
            $flag=1;
            //header("Location: login1.php");
        }
        if ($flag == 1){
            header("Location: login.php");
        }elseif($flag ==0){
            header("Location: home.php");
        }
    }

    if ($row_staff['email'] == $email){
        //staff login
        if($email == $row_staff['email'] && md5($password) == $row_staff['password'] && $captcha == $_SESSION['code']){
            //login success
            $_SESSION['username'] = $row_staff['username'];
            $_SESSION['first_name'] = $row_staff['first_name'];
            $_SESSION['last_name'] = $row_staff['last_name'];
            $_SESSION['id'] = $row_staff['id'];
            $_SESSION['roles'] = $row_staff['roles'];
            $flag=0;
            //header("Location: home.php");
        }
        if ($email != $row_staff['email'] ){
            $_SESSION['email_error'] = $email_error;
            $flag=1;
            //header("Location: login1.php");
        }
        if (md5($password) != $row_staff['password']){
            $_SESSION['password_error'] = $password_error;
            $flag=1;
           // header("Location: login1.php");
        }
        if ($captcha != $_SESSION['code']){
            $_SESSION['captcha_error'] = $captcha_error;
            $flag=1;
            //header("Location: login1.php");
        }
        if ($flag == 1){
            header("Location: login.php");
        }elseif($flag ==0){
            header("Location: home.php");
        }
    }

    

}

?>