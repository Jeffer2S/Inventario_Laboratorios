<?php
    $servername = "localhost";
    $username="root";
    $password="";
    $database="inv_laboratorio";
    $conn=mysqli_connect($servername, $username, $password, $database);
    if (!$conn){
        die("Error connecting ".mysqli_connect_error());
    }
?>