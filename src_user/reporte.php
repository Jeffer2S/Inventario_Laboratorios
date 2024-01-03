<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .bienes {
            display: flex;
            margin: 5% 5%;
            flex-direction: column;
            justify-content: space-around;
            background-color: paleturquoise;
            border-radius: 30px;
        }

        .bienes_box {
            margin: auto;
        }

        select {

            margin-top: 5%;
        }

        label {
            margin-top: 5%;
        }

        input {
            margin-top: 5%;
        }
    </style>
</head>

<body>

    <?php
    include('../db.php');
    if (isset($_GET['parametro'])) {
        $id = $_GET['parametro'];
    }
    ?>
    <div class="bienes">
        <?php

        // Obtener datos para el combobox de Teclados
        $consulta_teclados = "SELECT id_bien FROM bienes WHERE tipo_bien='Teclado' AND id_lab_per = $id";
        $resultado_teclados = mysqli_query($conexion, $consulta_teclados);

        // Obtener datos para el combobox de Sillas
        $consulta_sillas = "SELECT id_bien FROM bienes WHERE tipo_bien='Silla' AND id_lab_per = $id";
        $resultado_sillas = mysqli_query($conexion, $consulta_sillas);

        // Obtener datos para el combobox de Pantallas
        $consulta_pantallas = "SELECT id_bien FROM bienes WHERE tipo_bien='Pantalla'AND id_lab_per = $id";
        $resultado_pantallas = mysqli_query($conexion, $consulta_pantallas);

        // Obtener datos para el combobox de Mesas
        $consulta_mesas = "SELECT id_bien FROM bienes WHERE tipo_bien='Mesa'AND id_lab_per = $id";
        $resultado_mesas = mysqli_query($conexion, $consulta_mesas);

        // Obtener datos para el combobox de Computadores
        $consulta_computadores = "SELECT id_bien FROM bienes WHERE tipo_bien='Computador'AND id_lab_per = $id";
        $resultado_computadores = mysqli_query($conexion, $consulta_computadores);

        $op = "selecione";

        echo '<form method="post" action="insertReporte.php" class="bienes_box">';

        // Combobox de Teclados
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

        mysqli_close($conexion);

        // Iniciar o reanudar la sesión
        session_start();

        // Acceder a las variables guardadas en la sesión
        $nombre = $_SESSION['nombre'];
        $email = $_SESSION['email'];
        $p_nombre = $_SESSION['p_nombre'];
        $apellido = $_SESSION['apellido'];

        // Puedes utilizar las variables como desees en este archivo



        echo '<label for="nombre">Nombre:</label>';
        echo '<input type="text" name="nombre" value="' . $p_nombre . '"><br>';

        echo '<label for="apellido">Apellido:</label>';
        echo '<input type="text" name="apellido" value="' . $apellido . '"><br>';

        echo '<label for="correo">Correo:</label>';
        echo '<input type="email" name="correo" value="' . $email . '"><br>';

        echo '<label for="comentario">Comentario:</label>';
        echo '<textarea name="comentario"></textarea><br>';

        echo '<label for="sugerencia">Sugerencia:</label>';
        echo '<input type="text" name="sugerencia"><br>';


        echo '<label for="tipo">Selecciona una opción:</label>';
        echo '<select id="tipo" name="tipo">';
        echo '<option value="">Selecciona una opción</option>';
        echo '<option value="reporte">reporte</option>';
        echo '<option value="sugerencia">sugerencia</option>';
        echo '</select>';

        echo '<input type="submit" value="Enviar">';
        echo '</form>';

        ?>
    </div>


</body>

</html>