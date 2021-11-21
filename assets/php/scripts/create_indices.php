<?php

include "../../db/connect.php";

if (mysqli_connect_errno()){
    printf("Connection failed: %s <br/>", mysqli_connect_error());
}
else{
    $query = "create index PurchaseIndex on Purchase(product_id, user_id)";

    $res = mysqli_query($dbconn, $query);
    if ($res===TRUE){
        printf("index created <br/>");
    }else{
        printf("error creating index <br/>");
    }

    mysqli_close($dbconn);

}