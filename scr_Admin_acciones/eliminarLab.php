<?php
include 'conexion.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$stmt = $conn->prepare("DELETE FROM usuarios WHERE id=?");
$stmt->bind_param("s", $id);

if ($stmt->execute()) {
    header('Location: homeAdmin.html');
    exit();
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
