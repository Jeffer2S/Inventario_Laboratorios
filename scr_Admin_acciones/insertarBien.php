<?php
include 'conexion.php';

session_start();

if ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_bien = $_POST['Id_bien'];
        $nom_bien = $_POST['nom_bien'];
        $est_bien = $_POST['est_bien'];
        $nro_bien = $_POST['nro_bien'];
        $lab_per = $_POST['lab_per'];

        $sqlInsertar = "INSERT INTO bienes VALUES ('$id_bien', '$nom_bien', '$est_bien', '$nro_bien', '$lab_per')";

        if ($conn->query($sqlInsertar) === TRUE) {
            $_SESSION['mensaje'] = "Se guardó exitosamente."; 
            header("Location: insertarBien.html"); 
        } else {
            echo json_encode("Error al insertar: " . $conn->error); 
        }
    } else {
        echo json_encode("No se recibieron datos para insertar"); 
    }
} else {
    echo json_encode("Error de conexión a la base de datos"); 
}

$conn->close();
?>