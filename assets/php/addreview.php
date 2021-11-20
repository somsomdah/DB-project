<?php


session_start();

include "../db/connect.php";

$product_id = $_POST["product_id"];
$rate = $_POST["rating"];
$content = $_POST["content"];
$user_id = $_SESSION['id'];
$user_email = $_SESSION['email'];
$time = date( 'Y-m-d H:i:s' );
if (!$user_id){
    echo "<script> alert('Please login first.'); location.href = '".$_SERVER['HTTP_REFERER']."' </script>";
}
$query = sprintf("select * from Purchase where product_id=%d and user_id=%d", $product_id, $user_id);
$res = mysqli_query($dbconn, $query);
if ($res){
    if(mysqli_num_rows($res)){
        $query2 = sprintf("insert into Review (user_id, product_id, rate, content, time) value(%d, %d, %d,'%s','%s')",
                            $user_id, $product_id, $rate, $content, $time);
        $res2 = mysqli_query($dbconn, $query2);
        if($res2){
            echo '<script> alert("Your review has been registered."); ';
            echo 'location.href = "'.$_SERVER['HTTP_REFERER'].'" </script>';
        }else{
            echo mysqli_error($dbconn);
        }
    }else{
        echo '<script> alert("You did not purchase the product."); ';
        echo 'location.href = "'.$_SERVER['HTTP_REFERER'].'" </script>';
    }
}else{
    echo mysqli_error($dbconn);
}







// header('Location: '.$_SERVER['HTTP_REFERER']);
