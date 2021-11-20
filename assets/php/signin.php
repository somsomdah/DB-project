<?php
session_start();
include "../db/connect.php";

$email = $_POST["email"];
$password = $_POST["password"];

$query = sprintf("select * from User where email='%s'and password='%s'", $email, $password);
$res = mysqli_query($dbconn, $query);
$user = mysqli_fetch_array($res,MYSQLI_ASSOC);

if($res){
    $_SESSION['email']=$email;
    $_SESSION['id']=$user['id'];
    echo "<script> location.href = '../../index.php' </script>";
}else{
    echo mysqli_error($dbconn);
}

// header('Location: '.$_SERVER['HTTP_REFERER']);
