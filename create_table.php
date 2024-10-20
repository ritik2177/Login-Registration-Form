<?php
    //connecting to the Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "user";

    //create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    
    // Die if connection was not successful
    if(!$conn){
        die("sorry we failed to connect : ". mysqli_connect_error());
    }
    else{
        echo "Connectin was succesfully";
    }
    echo "<br>";

    //create table in db
    $sql = "CREATE TABLE `users` (`fname` VARCHAR(50) NOT NULL, `sno` INT(11) NOT NULL AUTO_INCREMENT, `username` VARCHAR(40) NOT NULL, `password` VARCHAR(20) NOT NULL, `dt` DATETIME NOT NULL DEFAULT current_timestamp(), `date` DATE NULL DEFAULT NULL, `address` VARCHAR(100) NOT NULL, PRIMARY KEY (`sno`))";

    $result = mysqli_query($conn, $sql);

    // Check for the table creation success

    if($result){
        echo "The table is created in db successfully! <br>";
    }
    else{
        echo  "The table was not created successfully because of this error --->". mysqli_error($conn);
    }
    ?>