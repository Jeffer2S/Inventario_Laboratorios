en el php de eliminar pon este codigo mejor

<?php
// eliminar_reporte.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_rep'])) {
    $id_rep = $_POST['id_rep'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inv_laboratorio";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $estado_rechazado = "rechazado";
    $sql = "UPDATE reportes SET estado_rep = '$estado_rechazado' WHERE id_rep = $id_rep";

    if ($conn->query($sql) === TRUE) {
        echo "Reporte eliminado exitosamente";
    } else {
        echo "Error al eliminar el reporte: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Error en la solicitud";
}
?>


para que no se elimine de la base si no solo cambie el estado a rechazado