<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .bienes {

            width: 100%;
            height: 99%;
            flex-direction: column;
            justify-content: space-around;
            background-color: paleturquoise;
            background: #0F2027;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2C5364, #203A43, #0F2027);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            margin: 0;
            padding: 0;
            border-radius: 10px;

        }

        .bienes_box {
            text-align: center;
            border-radius: 10px;
            padding: 10px;
            margin: 10px;

        }

        .bienes_box>.btn {
            background-color: #8cfca4;
            border: none;
            padding: 10px 10px;
            border-radius: 7px;
        }

        .bienes_box>.btn:hover {
            background-color: #ff9688;
        }

        .bienes-cont {
            display: inline-flex;
            background-color: #ff9688c7;
            border-radius: 15px;
            margin: 5px;
        }

        .bien-cont {
            display: flex;
            flex-direction: column;
            text-align: center;

        }

        .formulario {
            display: flex;
            width: 90%;
            align-items: end;

        }

        .formulario>label {
            width: 20%;
            margin: 0 0 0 10px;
            color: white;

        }

        .formulario>input {
            width: 20%;
            border: none;
            border-radius: 3px;
        }

        select {

            margin-top: 5%;
            padding: 2px;
        }

        label {
            margin-top: 5%;
            padding: 4px;
        }

        input {
            margin-top: 5%;
            padding: 4px;
        }

        h2 {
            font-family: sans-serif;
            font-size: 20px;
            font-weight: 100;
            background-color: rgba(103, 245, 134, 0.8);
            border-radius: 7px;
        }
    </style>
</head>

<body>

    <?php
    include('../db.php');
    if (isset($_GET['parametro'])) {
        $id = $_GET['parametro'];
        session_start();
        $email = $_SESSION['email'];
        $_SESSION['id'] = $id;
    }
    ?>
    <div class="bienes">
        <?php

        // Obtener datos para el combobox de Teclados
        //$consulta_teclados = "SELECT id_bien FROM bienes WHERE tipo_bien='Teclado' AND id_lab_per = $id";
        //$resultado_teclados = mysqli_query($conexion, $consulta_teclados);

        // Obtener datos para el combobox de Teclados
        $consulta_lab = "SELECT nom_lab FROM laboratorios WHERE id_lab = $id";
        $resultado_lab = mysqli_query($conexion, $consulta_lab);
        $fila_lab = mysqli_fetch_assoc($resultado_lab);
        $nom_lab = $fila_lab['nom_lab'];

        $consulta = "SELECT id_bien, tipo_bien FROM bienes WHERE id_lab_per = $id";
        $resultado = mysqli_query($conexion, $consulta);

        // Obtener datos para el combobox de Sillas
        //$consulta_sillas = "SELECT id_bien FROM bienes WHERE tipo_bien='Silla' AND id_lab_per = $id";
        //$resultado_sillas = mysqli_query($conexion, $consulta_sillas);

        // Obtener datos para el combobox de Pantallas
        //$consulta_pantallas = "SELECT id_bien FROM bienes WHERE tipo_bien='Pantalla'AND id_lab_per = $id";
        //$resultado_pantallas = mysqli_query($conexion, $consulta_pantallas);

        // Obtener datos para el combobox de Mesas
        //$consulta_mesas = "SELECT id_bien FROM bienes WHERE tipo_bien='Mesa'AND id_lab_per = $id";
        //$resultado_mesas = mysqli_query($conexion, $consulta_mesas);

        // Obtener datos para el combobox de Computadores
        //$consulta_computadores = "SELECT id_bien FROM bienes WHERE tipo_bien='Computador'AND id_lab_per = $id";
        //$resultado_computadores = mysqli_query($conexion, $consulta_computadores);

        //$op = "selecione";

        echo '<form method="post" action="insertReporte.php" class="bienes_box">';

        echo '<h2>BIENES LABORATORIO '. $nom_lab. '</h2>';
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $id_bien = $fila['id_bien'];
            $tipo_bien = $fila['tipo_bien'];

            // Incluir imágenes según el tipo de bien
            $imagen_src = obtenerRutaImagen($tipo_bien);

            echo '<div class="bienes-cont">';
            echo '<label class="bien-cont">';
            echo '<input type="checkbox" name="bienes_seleccionados[]" value="' . $id_bien . '">';
            //echo $tipo_bien;
            echo '<br>';
            echo 'ID: ' . $id_bien;
            echo '<img src="' . $imagen_src . '" alt="' . $tipo_bien . '">';
            echo '</label>';
            echo '</div>';
        }

        // Combobox de Teclados
        /*
        echo '<label for="tecladosCombo">Teclados:</label>';
        echo '<select  name="tecladosCombo">';
        if ((mysqli_num_rows($resultado_teclados)) < 1) {
            echo '<option value="' . "" . '">' . $op . '</option>';
        }
        while ($fila = mysqli_fetch_assoc($resultado_teclados)) {
            $id_bien = $fila['id_bien'];
            echo '<option value="' . "" . '">' . $op . '</option>';
            echo '<option value="' . $id_bien . '">' . $id_bien  . '</option>';
        }
        echo '</select><br>';

        // Combobox de Sillas
        echo '<label for="sillasCombo">Sillas:</label>';
        echo '<select name="sillasCombo">';
        if (mysqli_num_rows($resultado_sillas) < 1) {
            echo '<option value="' . "" . '">' . $op . '</option>';
        }
        while ($fila = mysqli_fetch_assoc($resultado_sillas)) {
            echo '<option value="' . "" . '">' . $op . '</option>';
            $id_bien = $fila['id_bien'];
            echo '<option value="' . $id_bien . '">' . $id_bien  . '</option>';
        }
        echo '</select><br>';

        // Combobox de Pantallas
        echo '<label for="pantallasCombo">Pantallas:</label>';
        echo '<select name="pantallasCombo">';
        if (mysqli_num_rows($resultado_pantallas) < 1) {
            echo '<option value="' . "" . '">' . $op . '</option>';
        }
        while ($fila = mysqli_fetch_assoc($resultado_pantallas)) {
            echo '<option value="' . "" . '">' . $op . '</option>';
            $id_bien = $fila['id_bien'];
            echo '<option value="' . $id_bien . '">' . $id_bien . '</option>';
        }
        echo '</select><br>';

        // Combobox de Mesas
        echo '<label for="mesasCombo">Mesas:</label>';
        echo '<select name="mesasCombo">';
        if (mysqli_num_rows($resultado_mesas) < 1) {
            echo '<option value="' . "" . '">' . $op . '</option>';
        }
        while ($fila = mysqli_fetch_assoc($resultado_mesas)) {
            echo '<option value="' . "" . '">' . $op . '</option>';
            $id_bien = $fila['id_bien'];
            echo '<option value="' . $id_bien . '">' . $id_bien . '</option>';
        }
        echo '</select><br>';

        // Combobox de Computadores
        echo '<label for="computadoresCombo">Computadores:</label>';
        echo '<select name="computadoresCombo">';

        if (mysqli_num_rows($resultado_computadores) < 1) {
            echo '<option value="' . "" . '">' . $op . '</option>';
        }

        while ($fila = mysqli_fetch_assoc($resultado_computadores)) {
            $id_bien = $fila['id_bien'];
            echo '<option value="' . "" . '">' . $op . '</option>';
            echo '<option value="' . $id_bien . '">' . $id_bien  . '</option>';
        }

        echo '</select><br>';
        */

        mysqli_close($conexion);

        // Iniciar o reanudar la sesión


        // Acceder a las variables guardadas en la sesión
        //$nombre = $_SESSION['nombre'];

        //$p_nombre = $_SESSION['p_nombre'];
        //$apellido = $_SESSION['apellido'];

        // Puedes utilizar las variables como desees en este archivo


        echo '<div class="formulario">';
        //echo '<label for="nombre">Nombre:</label>';
        //echo '<input type="text" name="nombre" value="' . $p_nombre . '"><br>';

        //echo '<label for="apellido">Apellido:</label>';
        //echo '<input type="text" name="apellido" value="' . $apellido . '"><br>';

        echo '<label for="correo">Correo:</label>';
        echo '<input type="email" name="correo" value="' . $email . '"><br>';

        echo '<label for="comentario">Comentario:</label>';
        echo '<textarea name="comentario"></textarea><br>';

        //echo '<label for="sugerencia">Sugerencia:</label>';
        //echo '<input type="text" name="sugerencia"><br>';


        //echo '<label for="tipo">Selecciona una opción:</label>';
        //echo '<select id="tipo" name="tipo">';
        //echo '<option value="">Selecciona una opción</option>';
        //echo '<option value="reporte">reporte</option>';
        //echo '<option value="sugerencia">sugerencia</option>';
        //echo '</select>';
        echo '</div>';
        echo '<input type="submit" value="Enviar" class="btn">';
        echo '</form>';
        function obtenerRutaImagen($tipo_bien)
        {
            // y se permite tanto la extensión PNG como JPG
            $extensiones_permitidas = ['png', 'jpg'];

            foreach ($extensiones_permitidas as $extension) {
                $ruta_imagen = './img/' . strtolower($tipo_bien) . '.' . $extension;
                if (file_exists($ruta_imagen)) {
                    return $ruta_imagen;
                }
            }

            // Si no se encuentra ninguna imagen, puedes devolver una imagen predeterminada o mostrar un mensaje de error
            return './img/imgx.png';
        }

        ?>
    </div>


</body>

</html>