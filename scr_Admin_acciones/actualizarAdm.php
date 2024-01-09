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
    setcookie('actualizacion_exitosa', 'true', time() + 5, '/'); // Establecer la cookie de éxito por 5 segundos
    header('Location: listarAdm.html');
    exit();
} else {
    echo "Error al actualizar datos: " . $conn->error;
}

$conn->close();
?>
