<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['ced_lab'];
    $nombre = $_POST['nom_lab'];
    $apellido = $_POST['ape_lab'];
    $direccion = $_POST['dir_lab'];
    $telefono = $_POST['tel_lab'];
    $sexo = $_POST['sex_lab'];

    $sqlInsertar = "INSERT INTO laboratoristas VALUES ('$cedula', '$nombre', '$apellido', '$direccion', '$telefono', '$sexo')";

    if ($conn->query($sqlInsertar) === TRUE) {
        echo json_encode("Se insertó correctamente");
    } else {
        echo json_encode("Error al insertar: " . $conn->error);
    }
} else {
    echo json_encode("No se recibieron datos para insertar");
}

$conn->close();
?>
