<?php

session_start();
unset($_SESSION['email']);
unset($_SESSION['id']);
echo "<script> location.href = '../../index.php' </script>";