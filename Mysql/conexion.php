<?php
    $servername = "localhost";
    $username="root";
    $password="root123";
    $database="sistema_laboratorios";
    $conn=mysqli_connect($servername, $username, $password, $database);
    if (!$conn){
        die("Error connecting ".mysqli_connect_error());
    }
?>