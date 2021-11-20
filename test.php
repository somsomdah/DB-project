<?php
session_start();
echo $_SESSION['test'];
if(!$_SESSION['test']){
    $_SESSION['test']='1234';

}

