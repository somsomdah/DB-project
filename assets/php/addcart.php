<?php
session_start();
include "../db/connect.php";

$count = $_POST["count"];
$product_id = $_POST["product_id"];
$user_id = $_SESSION['id'];
if (!$user_id){
    echo "<script> alert('Please login first.'); location.href = '".$_SERVER['HTTP_REFERER']."' </script>";
}

$query = sprintf("insert into Cart (user_id, product_id, count) value(%d,%d,%d)",$user_id, $product_id, $count);
$res = mysqli_query($dbconn, $query);
if($res){
    echo "<script> alert('Product has been added to the shopping cart.'); location.href = '".$_SERVER['HTTP_REFERER']."' </script>";
}else{
    echo mysqli_error($dbconn);
}

// header('Location: '.$_SERVER['HTTP_REFERER']);
