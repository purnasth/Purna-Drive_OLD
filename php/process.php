<?php
require "./session.php";
require_once "./database.php";

$username = mysqli_real_escape_string($con,$_POST['username']);
$email = mysqli_real_escape_string($con,$_POST['email']);
// $password = mysqli_real_escape_string($con,$_POST['password']);
$password = md5(mysqli_real_escape_string($con,$_POST['password']));

//pass = password_hash($password, PASSWORD_BCRYPT);


    $sql = "SELECT count(*) FROM purnadrive_data where username='$username' and password='$password'";
    $result = mysqli_query($con,$sql);

    $row = mysqli_fetch_array($result);
    $count = $row['count(*)'];

    if($count > 0){
        $_SESSION['username'] = $username;
        header("Location:../index.php");
    }
    else{
        header("Location:../form.php?error=INVALID CREDENTIALS!!!");
    }


?>