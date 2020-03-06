<?php

include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();

$username_taken = "username taken";
$email_taken = "email taken";
$register_success = "";
$captcha_error = "captcha invalid";
unset($_SESSION['username_taken']);
unset($_SESSION['email_taken']);
unset($_SESSION['password_invalid']);
unset($_SESSION['register_success']);

if(isset($_POST['form_submit'])) {
    $username = mysqli_real_escape_string($connString, trim($_POST['username']));
    $email = mysqli_real_escape_string($connString, trim($_POST['email']));
    $gender = mysqli_real_escape_string($connString, trim($_POST['gender']));
    $captcha = mysqli_real_escape_string($connString, trim($_POST['captcha']));
    $first_name = mysqli_real_escape_string($connString, trim($_POST['first_name']));
    $last_name = mysqli_real_escape_string($connString, trim($_POST['last_name']));

    //Error trapping for similar username and Email
    $sql_username = "SELECT username FROM user WHERE username = '$username'";
    $sql_email = "SELECT email FROM user WHERE email = '$email'";
    $result_username = mysqli_query($connString, $sql_username) or die(mysqli_error($connString));
    $result_email = mysqli_query($connString, $sql_email) or die(mysqli_error($connString));

    if(mysqli_num_rows($result_username) > 0){
        $_SESSION['username_taken'] = $username_taken;
        $flag=1;
       // header("Location: login1.php");
    } 
    if (mysqli_num_rows($result_email) > 0){
        $_SESSION['email_taken'] = $email_taken;
        $flag=1;
        //header("Location: login1.php");
    }
    
    if ($captcha != $_SESSION['code']){
        $_SESSION['captcha_error'] = $captcha_error;
        $flag=1;
        //header("Location: login1.php");
    }

    $password = mysqli_real_escape_string($connString, trim($_POST['password']));

    //Error trapping for invalid password
    if (strlen($password) <= '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        $flag=1;
    } else if(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
        $flag=1;
    } else if(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        $flag=1;
    } else if(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        $flag=1;
    }

    if(isset($passwordErr)){
        $_SESSION['password_invalid'] = $passwordErr;
        unset($passwordErr);
        $flag=1;
        //header("Location: register1.php");
    }
    if($flag ==0){
        $encrypted_password = md5($password);
        $sql = "INSERT INTO `user` (`first_name`,`last_name`,`username`, `password`, `gender`, `email`, `roles`) VALUES
                    ('".$first_name."','".$last_name."','".$username."', '".$encrypted_password."', '".$gender."', '".$email."','".ro."');";
        $resultset = mysqli_query($connString, $sql) or die("database error:". mysqli_error($connString));
        if($resultset){
            $_SESSION['add_account_success'] = "You have added a new account to database"; 
            header("Location: list_account_details.php");
        }
    }elseif($flag ==1){
        header("Location: add_account_member.php");
    }

        
    

    
}
?>