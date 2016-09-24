<?php 
    $servername = "localhost";
    $username = "root";
    $pwd = "";
    $dbname = "sharefreetime_db";

    // Create connection
    $mysqli = new mysqli($servername, $username, $pwd);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    } 
    echo "Connected successfully";
    
    //connect to database
    $db = mysqli_connect($servername, $username, $pwd, $dbname);
?>