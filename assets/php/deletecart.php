<?php
session_start();
include "../db/connect.php";

$cart_id = $_GET["cart_id"];
$user_id = $_SESSION['id'];
$query = sprintf("delete from Cart where id=%d and user_id=%d",$cart_id,$user_id);
$res = mysqli_query($dbconn, $query);
if($res){
    echo "<script> alert('Product has been removed from the shopping cart.'); location.href = '".$_SERVER['HTTP_REFERER']."' </script>";
}else{
    echo mysqli_error($dbconn);
}

// header('Location: '.$_SERVER['HTTP_REFERER']);
