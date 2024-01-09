<?php
    require 'Mysql/conexion.php';    
    $consulta=" SELECT l.*, u.apellido, u.nombre
    FROM laboratorios AS l
    INNER JOIN usuarios AS u ON l.laboratorista_encargado=u.id";
    $result=$conn->query($consulta);
    if ($result){
        ?>
        <head>
            <link rel="stylesheet" href="./css/estilosLaboratorios.css">
        </head>
        <div class="contenedor-principal">
        <div class="contenedor">
        <?php
        while ($row=$result->fetch_array()){
            $num_lab = $row['id_lab'];
            $nom_lab = $row['nom_lab'];
            $pis_lab = $row['piso_lab'];
            $lab_enc = $row['apellido'].' '.$row['nombre'];
            ?>
                <div class="cuadro-contenedor" onclick="mostrarInformacion(<?php echo $num_lab?>, this)">
                <div> 
                    <?php echo $nom_lab?>
                    <br>
                    <?php echo 'Piso'.$pis_lab?>
                    <p>Laboratorista Encargado:</p><br>
                    <?php
                    echo $lab_enc;
                    ?>
                </div>
                <div class="informacionAdicional">
                <h2><?php echo $nom_lab?></h2>
                <div class="cuadrosAdicionales">
                <?php 
                $consulta_bienes = " SELECT * FROM bienes
                WHERE id_lab_per= $num_lab
                ORDER BY tipo_bien";
                $result2=$conn->query($consulta_bienes);
                    while($row2=$result2->fetch_array()){
                        ?> <div class="cuadroAdicional">
                            <?php echo $row2['tipo_bien'].': '?>
                            <?php echo $row2['id_bien']?>
                            <br>
                            <br>
                            <?php echo 'Estado: '.$row2['est_bien']?>
                        </div><?php
                    }
                ?>
                </div>
                </div>
            </div>
            <?php
            }
            ?>
            </div>
            </div>
            <script>
                let cuadroSeleccionado = 0;
                let cuadroActual = null;

                function mostrarInformacion(numeroCuadro, cuadroContenedor) {
                const informacionAdicionales = document.querySelectorAll('.informacionAdicional');

                if (cuadroSeleccionado === numeroCuadro) {
                    cuadroSeleccionado = 0;
                    cuadroActual.classList.remove('destacado');
                    cuadroActual = null;
                } else {
                    cuadroSeleccionado = numeroCuadro;

                    informacionAdicionales.forEach(info => {
                    info.parentNode.classList.remove('destacado');
                    });

                    cuadroActual = cuadroContenedor;
                    cuadroActual.classList.add('destacado');
                }
                }
            </script>
            <?php
    }    
?>