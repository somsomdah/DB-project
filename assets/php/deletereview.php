<?php

session_start();
include "../db/connect.php";

$review_id = $_GET["review_id"];
$user_id = $_SESSION['id'];
$query = sprintf("delete from Review where id=%d and user_id=%d", $review_id, $user_id);
$res = mysqli_query($dbconn, $query);
if($res){
    echo "<script> alert('Your review is deleted.'); location.href = '".$_SERVER['HTTP_REFERER']."' </script>";
}else{
    echo mysqli_error($dbconn);
}

// header('Location: '.$_SERVER['HTTP_REFERER']);
