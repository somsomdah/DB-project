<?php
include_once 'info.php';
$dbconn = isConnectDb($db);
function isConnectDb($db)
{
    $conn = mysqli_connect($db['host'],$db['user'],$db['password'],$db['name'],$db['port']);
    mysqli_set_charset($conn, "utf8");  // DB설정이 잘못되어 euc-kr 로 되어 있으면 문제가 됨
    if (mysqli_connect_errno()) {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
       exit;
    } else {
      return $conn;   
    }
}
?>