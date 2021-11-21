<?php

include "../../db/connect.php";

if (mysqli_connect_errno()){
    printf("Connection failed: %s <br/>", mysqli_connect_error());
}
else{
    $query[0] = "create table Product(
        id int not null primary key auto_increment,
        gender varchar(10),
        master_category varchar(20),
        sub_category varchar(20),
        article_type varchar(20),
        base_colour varchar(20),
        season varchar(10),
        year int,
        style varchar(20),
        name varchar(50),
        image varchar(200),
        price int,
        view int
    )";

    $query[1] = "create table User(
        id int not null primary key auto_increment,
        email varchar(50) unique,
        password varchar(50),
        first_name varchar(50),
        last_name varchar(50),
        phone varchar(20)
    )";

    $query[2] = "create table Cart(
        id int not null primary key auto_increment,
        user_id int references User(id),
        product_id int references Product(id),
        count int
    )";

    $query[3] = "create table Purchase(
        id int not null primary key auto_increment,
        user_id int references User(id),
        product_id int references Product(id),
        time datetime,
        count int,
        address varchar(50)
    )";

    $query[4] = "create table Review(
        id int not null primary key auto_increment,
        product_id int references Product(id),
        user_id int references User(id),
        time datetime,
        content varchar(1000),
        rate int
    )";

    for($i=0; $i<5; $i++){
        $res = mysqli_query($dbconn, $query[$i]);
        if ($res===TRUE){
            printf("table ".$i." created <br/>");
        }else{
            printf("error creating table".$i.": ".mysqli_error($dbconn)." <br/>");
        }
    }

    mysqli_close($dbconn);

}