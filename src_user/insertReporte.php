<?php
include('../db.php'); // Asegúrate de incluir tu archivo de conexión a la base de datos
$estado="enviado";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    //$teclado = $_POST['tecladosCombo'];
    $teclado = '121314';
    $silla = $_POST['sillasCombo'];
    $pantalla = $_POST['pantallasCombo'];
    $mesa = $_POST['mesasCombo'];
    $computador = $_POST['computadoresCombo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $comentario = $_POST['comentario'];
    $sugerencia = $_POST['sugerencia'];

    // Combina los valores en una cadena
    //$bienes_combinados = "$teclado|$silla|$pantalla|$mesa|$computador";
    //$fecha_hora_combinadas = "$fecha $hora";

    // Insertar datos en la base de datos
    $consulta_insertar = "INSERT INTO reportes (fec_hora_rep, nom_est, ape_est, cor_est, id_bien_rep, comen_rep, estado_rep,sugerencia_rep	) 
                         VALUES ( NOW(),'$nombre', '$apellido', '$correo', '$teclado','$comentario', '$estado','$sugerencia')";

    if (mysqli_query($conexion, $consulta_insertar)) {
        echo '<h1 style="color: green; text-align: center;">Datos insertados correctamente</h1>';
    } else {
        echo "Error al insertar datos: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
} else {
    echo "Acceso no permitido";
}
?>
