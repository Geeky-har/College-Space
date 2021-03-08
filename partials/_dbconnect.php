<?php

    // creating database connection
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $database = "college space";


    $conn = mysqli_connect($servername, $username, $password, $database);

    // die if not successfull

    if(!$conn){
        die("Sorry not able to connect right now");
    }

?>

