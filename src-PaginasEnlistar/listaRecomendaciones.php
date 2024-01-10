<?php
    require 'Mysql/conexion.php';    
    ?>
    <head>
        <link rel="stylesheet" href="./css/estilosTablas.css">
    </head>
    <?php
    $consulta="SELECT r.*, l.nom_lab, u.nombre, u.apellido
    FROM reportes AS r
    INNER JOIN laboratorios AS l ON l.id_lab = r.id_lab_per
    INNER JOIN usuarios AS u ON l.id_lab = r.id_lab_per AND u.id = l.laboratorista_encargado";
    ?>
    <div><h2 class="titulo">Reportes Realizados:</h2></div>
    <?php
    $result=$conn->query($consulta);
    // if ($result){
        $cont=1;
        ?>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th scope="row"></th>
                        <th scope="col">Fecha/Hora</th>
                        <th scope="col">Laboratorio</th>
                        <th scope="col">Descripción Del Reporte</th>
                        <th scope="col">Bienes Reportados</th>
                        <th scope="col">Emisor</th>
                        <th scope="col">L. Responsable</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        while ($row=$result->fetch_array()){
            $id_rep = $row['id_rep'];
            $fec_rep = $row['fec_hora_rep'];
            $des_rep = $row['comen_rep'];
            $id_lab = $row['nom_lab'];
            $ema_dif = $row['cor_est'];
            $lab_res = $row['apellido'].' '.$row['nombre'];
            $est_rep = $row['estado_rep'];
            ?>
                <tr>
                    <td><?php echo $cont?></td>
                    <td><?php echo $fec_rep?></td>
                    <td><?php echo $id_lab?></td>
                    <td><?php echo $des_rep?></td>
                    <?php 
                    $consultaBienes= "SELECT * FROM bienes
                    WHERE id_bien in (SELECT id_bien FROM detalle_reportes_bien
                    WHERE id_rep='$id_rep')";
                    $result1=$conn->query($consultaBienes);
                    ?> <td> <?php
                    if($result1){
                        while($row1=$result1->fetch_array()){
                            echo 'Tipo: '.$row1['tipo_bien'].' Cod: '.$row1['id_bien'];
                            ?> <br><?php
                        }
                    }
                    ?>
                    </td>
                    <td><?php echo $ema_dif?></td>
                    <td><?php echo $lab_res?></td>
                    <td><?php echo $est_rep?></td>
                </tr>
            <?php
            $cont++;
        }
        ?>
            </tbody>
            </table>
        </div>
        <br>
        <?php
    // }    
?>