<?php
    $host = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $database = 'portfolio';

    $mysqli = new mysqli($host, $dbusername, $dbpassword, $database);


    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }
?>