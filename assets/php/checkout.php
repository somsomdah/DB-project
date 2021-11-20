<?php
session_start();
include "../db/connect.php";

$user_id = $_SESSION['id'];
$address = sprintf("%s %s %s %s %s",$_POST['zipcode'], $_POST['state'], $_POST['city'], $_POST['address2'], $_POST['address']);
$time = date( 'Y-m-d H:i:s' );

$query = sprintf("Select id, product_id, count from Cart where user_id=".$user_id);
$res = mysqli_query($dbconn, $query);

if($res){

    mysqli_query($dbconn, "START TRANSACTION");
    $flag = true;
    while($cart=mysqli_fetch_array($res,MYSQLI_ASSOC)){
        $count = $cart['count'];
        $product_id = $cart['product_id'];

        $query2=sprintf("insert into Purchase (user_id, product_id,time,count,address) 
                        value($user_id, $product_id, '$time', $count, '$address')");
        $query3 = "delete from Cart where id=".$cart['id'];

        $res2 = mysqli_query($dbconn, $query2);
        $res3 = mysqli_query($dbconn, $query3);

        if (!($res2 and $res3)) {
            $flag = false;
            break;
        }
        
    }

    if ($flag) {
        mysqli_commit($dbconn);
        echo "<script> location.href = '../../checkout_complete.php'; </script>";
        
    } else {        
        mysqli_rollback($dbconn);
        echo "<script> alert('An error occured while checkout process.'); </script>";
        echo "<script> location.href = '../../cart.php'; </script>";

    }
    
}else{
    echo mysqli_error($dbconn);
}


