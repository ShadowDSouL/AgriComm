<?php 
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbase = "agricomm";


    $conn = mysqli_connect($servername, $user, $password, $dbase); 

    if($conn === false){
        die ("Error in connecting to database.....") . mysqli_connect_error(); 
    }
    $temperature = "101.5degrees";
    (double)$temperature;
    (int)$temperature;
    echo(string)$temperature;
?>
