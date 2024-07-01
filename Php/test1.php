<?php
    session_start();
    $server = "localhost";
    $uname = "root";
    $pass = "";
    $dbname = "phpproj";

    $connect = mysqli_connect($server,$uname,$pass,$dbname);
    $_SESSION['con'] = 0;

    if(!$connect)
    {
        echo "Failed".mysqli_connect_error();
    }
    else
    {
        $_SESSION['con'] = 1;
    }

?>