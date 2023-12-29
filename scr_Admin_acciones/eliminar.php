<?php
include 'conexion.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$cedula = $_POST['ced_lab'];


$sql = "DELETE FROM laboratoristas WHERE ced_lab='$cedula'";

if ($conn->query($sql) === TRUE) {
  
    header('Location: editarLab.html');
    exit();
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

$conn->close();
?>
