<?php
$servername="localhost";
$username="root";
$password="admin";
$database="inv_laboratorio";
$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("ERROR".mysqli_connect_error());
}

?>