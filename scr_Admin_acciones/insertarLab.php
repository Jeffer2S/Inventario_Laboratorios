<?php
include 'conexion.php'; 
session_start();

$id_cargo = 2;

if ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        
       
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        
    
        if (isset($id, $nombre, $apellido, $direccion, $telefono, $usuario, $contrasena)) {
            $sqlInsertar = "INSERT INTO usuarios VALUES ('$id', '$nombre', '$usuario', '$contrasena', '$apellido', '$direccion', '$telefono', '$id_cargo')";

            if ($conn->query($sqlInsertar) === TRUE) {
                $_SESSION['mensaje'] = "Se guardó exitosamente."; 
                header("Location: ../home.html");
            } else {
                echo json_encode("Error al insertar: " . $conn->error); 
            }
        } else {
            echo json_encode("No se recibieron datos completos para insertar"); 
        }
    } else {
        echo json_encode("No se recibieron datos para insertar"); 
    }
} else {
    echo json_encode("Error de conexión a la base de datos"); 
}

$conn->close();
?>
