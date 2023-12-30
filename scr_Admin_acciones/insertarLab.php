<?php
include 'conexion.php'; 

session_start();

if ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cedula = $_POST['ced_lab'];
        $nombre = $_POST['nom_lab'];
        $apellido = $_POST['ape_lab'];
        $direccion = $_POST['dir_lab'];
        $telefono = $_POST['tel_lab'];
        $sexo = $_POST['sex_lab'];

     
        $sqlInsertar = "INSERT INTO laboratoristas VALUES ('$cedula', '$nombre', '$apellido', '$direccion', '$telefono', '$sexo')";

        if ($conn->query($sqlInsertar) === TRUE) {
            $_SESSION['mensaje'] = "Se guardó exitosamente."; 
            header("Location: insertarLab.html"); 
        } else {
            echo json_encode("Error al insertar: " . $conn->error); // Mostrar mensaje de error
        }
    } else {
        echo json_encode("No se recibieron datos para insertar"); // Mostrar si no hay datos POST
    }
} else {
    echo json_encode("Error de conexión a la base de datos"); // Mostrar si hay error de conexión
}

$conn->close(); // Cerrar la conexión a la base de datos
?>
