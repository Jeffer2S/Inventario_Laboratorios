<?php
include 'conexion.php'; 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  
$cedula = $_POST['ced_lab'];
$nombre = $_POST['nom_lab'];
$apellido = $_POST['ape_lab'];
$direccion = $_POST['dir_lab'];
$telefono = $_POST['tel_lab'];
$sexo = $_POST['sex_lab'];
  
$sql = "UPDATE laboratoristas SET nom_lab='$nombre', ape_lab='$apellido', dir_lab='$direccion', tel_lab='$telefono', sex_lab='$sexo' WHERE ced_lab='$cedula'";
  
if ($conn->query($sql) === TRUE) {
    header('Location: editarLab.html');
    exit();
} else {
    echo "Error al actualizar datos: " . $conn->error;
}
  
$conn->close();
?>
