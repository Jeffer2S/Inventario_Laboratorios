<?php
    require 'Mysql/conexion.php';    
    $consulta=" SELECT l.*, u.apellido, u.nombre
    FROM laboratorios AS l
    INNER JOIN usuarios AS u ON l.laboratorista_encargado=u.id";
    $result=$conn->query($consulta);
    if ($result){
        ?>
        <head>
            <link rel="stylesheet" href="./src-PaginasEnlistar/css/estilosLaboratorios.css">
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
                    <?php echo $pis_lab?>
                    <p>Laboratorista Encargado:</p>
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
                            <?php echo $row2['tipo_bien']?>
                            <?php echo $row2['id_bien']?>
                            <?php echo $row2['est_bien']?>
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
            <?php
    }    
?>