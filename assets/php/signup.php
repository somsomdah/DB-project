<?php

include "../db/connect.php";

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$password = $_POST["password"];
$phone = $_POST['phone'];

$query = sprintf("insert into User (first_name, last_name, email, password, phone) value('%s','%s','%s','%s','%s')",
                $first_name, $last_name, $email, $password, $phone);
$res = mysqli_query($dbconn, $query);

if($res){
    echo "<script> location.href = '../../signin.php'; </script>";
}else{
    echo mysqli_error($db);
}

// header('Location: '.$_SERVER['HTTP_REFERER']);
