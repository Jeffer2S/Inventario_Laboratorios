<?php
include 'conexion.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo 'success'; // Devuelve 'success' si se elimina correctamente
        exit();
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
