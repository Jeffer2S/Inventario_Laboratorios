<?php
$servername="localhost";
$username="root";
$password="admin";
$database="inventario";
$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("ERROR".mysqli_connect_error());
}

?>