<?php

// Incluye la conexión PHP
include 'conexionB.php';

$sql = "SELECT * FROM reportes WHERE estado_rep = 'enviado' AND tipo_rep = 'sugerencia'";
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

?>
