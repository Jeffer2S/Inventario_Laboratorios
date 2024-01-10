<?php
include('../db.php'); // Asegúrate de incluir tu archivo de conexión a la base de datos
$estado="enviado";
session_start();
$id= $_SESSION['id'];
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    //$teclado = $_POST['tecladosCombo'];
    //$teclado = '121314';
    //$silla = $_POST['sillasCombo'];
    //$pantalla = $_POST['pantallasCombo'];
    //$mesa = $_POST['mesasCombo'];
    //$computador = $_POST['computadoresCombo'];
    //$nombre = $_POST['nombre'];
    //$apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $comentario = $_POST['comentario'];
    //$sugerencia = $_POST['sugerencia'];
    //$tipo = $_POST['tipo'];


    // Combina los valores en una cadena
    //$bienes_combinados = "$teclado|$silla|$pantalla|$mesa|$computador";
    //$fecha_hora_combinadas = "$fecha $hora";

    // Insertar datos en la base de datos
    //$consulta_insertar = "INSERT INTO reportes (fec_hora_rep, nom_est, ape_est, cor_est, id_bien_rep, comen_rep, estado_rep,sugerencia_rep,tipo_rep	) 
     //                    VALUES ( NOW(),'$nombre', '$apellido', '$correo', '$teclado','$comentario', '$estado','$sugerencia','$tipo')";

    $consulta_insertar = "INSERT INTO reportes (fec_hora_rep, cor_est, comen_rep, estado_rep, id_lab_per) 
                                        VALUES ( NOW(),'$correo', '$comentario', '$estado','$sugerencia','$id')";

    if (mysqli_query($conexion, $consulta_insertar)) {
        echo '<h1 style="color: green; text-align: center;">Datos insertados correctamente</h1>';
    } else {
        echo "Error al insertar datos: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
} else {
    echo "Acceso no permitido";
}*/


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $correo = $_POST['correo'];
    $comentario = $_POST['comentario'];
    $bienes_seleccionados = $_POST['bienes_seleccionados'];

    // Insertar datos en la tabla 'reportes'
    $consulta_insertar_reporte = "INSERT INTO reportes (fec_hora_rep, cor_est, comen_rep, estado_rep, id_lab_per) 
                                  VALUES (NOW(), '$correo', '$comentario', '$estado', $id)";
    
    if (mysqli_query($conexion, $consulta_insertar_reporte)) {
        // Obtener el id_rep generado
        $id_rep = mysqli_insert_id($conexion);

        // Insertar detalles de bienes seleccionados en la tabla 'detalle_reportes_bien'
        foreach ($bienes_seleccionados as $id_bien) {
            $consulta_insertar_detalles = "INSERT INTO detalle_reportes_bien (id_rep, id_bien) 
                                           VALUES ($id_rep, '$id_bien')";
            mysqli_query($conexion, $consulta_insertar_detalles);
        }

        echo '<h1 style="color: green; text-align: center;">Datos insertados correctamente</h1>';
    } else {
        echo "Error al insertar datos: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
} else {
    echo "Acceso no permitido";
}

header("Location: ./reporte.php?parametro=$id");

?>
