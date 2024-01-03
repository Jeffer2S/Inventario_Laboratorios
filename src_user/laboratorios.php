<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes Realizadas</title>
    <link rel="stylesheet" href="./stylee.css">
</head>

<body>
    <h2 class="titulo">Laboratorios</h2>
    <div class="container">

        <div class="container_title">
            <h2 class="txtformulario">Nombre</h2>
        </div>
        <div class="container_title">
            <h2 class="txtformulario">Piso</h2>
        </div> <!--
            <div class="contformulario">
                <h2 class="txtformulario1">Nombre de Solicitud</h2>
            </div>-->
        <div class="contbutton0">
            <h2 class="txtformulario">Reporte</h2>
        </div>
    </div>
    <?php
    include '../db.php';
    //$conn = $conexion;
    if (!mysqli_connect_errno()) {
        $sql = "SELECT * FROM laboratorios";
        $result = mysqli_query($conexion, $sql);
        if ($result) {
            while ($row = $result->fetch_array()) {
                $id = $row['id_lab'];
                $nombre = $row['nom_lab'];
                $piso = $row['piso_lab'];
                //$numeroFor=$row['num_for'];
    ?>

                <div class="container_d">
                    <div class="container_data">
                        <h2 class="txtformulario1 "><?php echo $nombre ?></h2>
                    </div>
                    <div class="container_data">
                        <h2 class="txtformulario1"><?php echo $piso ?></h2>
                    </div>
                    <!--
                    <div class="contformulario">
                        <h2 class="txtformulario"><?php // echo $solic
                                                    ?></h2>
                    </div> -->
                    <div class="contbutton">
                        <a  onclick="crearFormulario(<?php echo $id ?>)">
                        <p></p>
                        <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 64 64" id="Door"><path fill="none" stroke="#aa48b6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.13,8.63,32,16V56L13.25,47.87A2,2,0,0,1,12,46V10a2,2,0,0,1,2-2H41a2,2,0,0,1,2,2V46a2,2,0,0,1-2,2H32" class="colorStroke078cd6 svgStroke"></path><line x1="27.91" x2="24.13" y1="35.06" y2="33.5" fill="none" stroke="#aa48b6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="colorStroke078cd6 svgStroke"></line><polyline fill="none" stroke="#078cd6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="50 32.24 54.24 28 50 23.76"></polyline><line x1="54" x2="43" y1="28" y2="28" fill="none" stroke="#aa48b6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="colorStroke078cd6 svgStroke"></line></svg>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 48 48" id="Person"><path fill="#595bd4" fill-rule="evenodd" d="M24 24C28.4204 24 32 20.4204 32 16 32 11.5796 28.4204 8 24 8 19.5796 8 16 11.5796 16 16 16 20.4204 19.5796 24 24 24zM34 16C34 21.525 29.525 26 24 26 18.475 26 14 21.525 14 16 14 10.475 18.475 6 24 6 29.525 6 34 10.475 34 16zM9.22348 34.2119C8.22038 35.0211 8 35.6291 8 36V40H40V36C40 35.6291 39.7796 35.0211 38.7765 34.2119 37.7958 33.4207 36.3341 32.6669 34.5622 32.015 31.0199 30.7117 26.7532 30 24 30 21.2468 30 16.9801 30.7117 13.4378 32.015 11.6659 32.6669 10.2042 33.4207 9.22348 34.2119zM24 28C17.9925 28 6 31.0347 6 36V42H42V36C42 31.0347 30.0075 28 24 28z" clip-rule="evenodd" class="color333333 svgShape"></path></svg>
                    </a>
                    </div>
                </div>
    <?php
            }
        }
    }
    ?>


</body>

<script>
    function crearFormulario(parametro) {
        console.log(parametro);
        window.location.href = 'reporte.php?parametro=' + parametro;
    }
</script>

</html>