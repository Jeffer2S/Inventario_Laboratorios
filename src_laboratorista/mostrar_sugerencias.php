<?php
// Incluye la conexión PHP
include 'conexionB.php';

// Inicias sesión
session_start();

// Verifica si el usuario ha iniciado sesión y tiene un ID de usuario encargado
if (isset($_SESSION['idUsuario']) && isset($_SESSION['idUsuarioEncargado'])) {
    $idUsuario = $_SESSION['idUsuario'];
    $idUsuarioEncargado = $_SESSION['idUsuarioEncargado'];

    $sql = "SELECT r.*, l.nom_lab, l.piso_lab, b.id_bien, b.tipo_bien
        FROM reportes r
        LEFT JOIN laboratorios l ON r.id_lab_per = l.id_lab
        LEFT JOIN detalle_reportes_bien drb ON r.id_rep = drb.id_rep
        LEFT JOIN bienes b ON drb.id_bien = b.id_bien
        WHERE r.estado_rep = 'enviado' AND l.laboratorista_encargado = $idUsuarioEncargado";

    $result = mysqli_query($conn, $sql);

    // Verifica si se obtuvieron resultados
    if ($result) {
        // Inicializa un array para almacenar los datos de los reportes
        $reportes = array();

        // Itera sobre los resultados y agrega cada fila al array
        while ($row = mysqli_fetch_assoc($result)) {
            $reportes[] = $row;
        }

        // Libera el resultado de la consulta
        mysqli_free_result($result);

        // Cierra la conexión a la base de datos
        mysqli_close($conn);

        // Devuelve los datos de los reportes como JSON
        echo json_encode($reportes);
    } else {
        // No se encontraron reportes
        echo json_encode(array());
    }
} else {
    // Redirige a la página de inicio de sesión si no hay sesión activa
    header('Location: login.html');
    exit();
}
?>
