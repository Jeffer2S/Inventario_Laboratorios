<?php
include 'conexion.php'; 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
  
$sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono' WHERE id='$id'";
  
if ($conn->query($sql) === TRUE) {
    header('Location: homeAdmin.html');
    exit();
} else {
    echo "Error al actualizar datos: " . $conn->error;
}
  
$conn->close();
?>
