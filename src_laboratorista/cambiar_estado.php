<?php
include 'conexionB.php';

if (isset($_POST['id_rep'])) {
    $idReporte = $_POST['id_rep'];

    $sqlUpdate = "UPDATE reportes SET estado_rep = 'revision' WHERE id_rep = '$idReporte'";

    if (mysqli_query($conn, $sqlUpdate)) {
        echo "Estado actualizado correctamente";
    } else {
        echo "Error al actualizar el estado: " . mysqli_error($conn);
    }
} else {
    echo "ID de reporte no proporcionado";
}

mysqli_close($conn);
?>
