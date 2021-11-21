<?php

include "../../db/connect.php";

if (mysqli_connect_errno()){
    printf("Connection failed: %s <br/>", mysqli_connect_error());
}
else{
    $styles = fopen('../../data/styles.csv', 'r');
    $images = fopen('../../data/images.csv', 'r');
    fgetcsv($styles);
    fgetcsv($images);
    for($i=0;$i<500;$i++){
        $line_styles = fgetcsv($styles);
        $line_images = fgetcsv($images);
        $query = sprintf("insert into Product values(
           0, \"%s\", \"%s\", \"%s\", \"%s\", \"%s\", \"%s\", %s, \"%s\", \"%s\", \"%s\",".rand(10,100)." , 0
        )",$line_styles[1], $line_styles[2],
        $line_styles[3], $line_styles[4], 
        $line_styles[5], $line_styles[6], 
        $line_styles[7], $line_styles[8], 
        $line_styles[9], $line_images[1]);

        // printf($query);

        $res = mysqli_query($dbconn,$query);
        if($res){
            printf("success ".$i." <br/>");
            
        }else{
            printf(mysqli_error($dbconn)."<br/>");
        }
    }
    mysqli_close($dbconn);
}