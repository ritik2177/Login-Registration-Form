<?php
    //connecting to the Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    create a connection
    $conn = mysqli_connect($servername, $username, $password);

    // Create a db
    $sql = "CREATE DATABASE user";
    $result = mysqli_query($conn, $sql);

    //check for the database creation success
    if($result){
        echo "The db is created successfully!";
    }
    else{
        echo "The db is not created successfully! because of this error ---> ". mysqli_error($conn);
    }

    
    ?> 

