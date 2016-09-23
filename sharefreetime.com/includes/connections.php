<?php 
    $servername = "localhost";
    $username = "root";
    $pwd = "";
    $dbname = "authentication";

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