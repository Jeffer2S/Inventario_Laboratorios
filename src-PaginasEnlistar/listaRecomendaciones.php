<?php
    require 'Mysql/conexion.php';    
    ?>
    <head>
        <link rel="stylesheet" href="./src-PaginasEnlistar/css/estilosTablas.css">
    </head>
    <?php
    $consultaRep="SELECT r.*, b.tipo_bien, l.nom_lab, u.nombre, u.apellido
    FROM reportes AS r
    INNER JOIN bienes AS b ON r.id_bien_rep = b.id_bien
    INNER JOIN laboratorios AS l ON r.id_bien_rep = b.id_bien AND l.id_lab = b.id_lab_per
    INNER JOIN usuarios AS u ON r.id_bien_rep = b.id_bien AND l.id_lab = b.id_lab_per AND u.id = l.laboratorista_encargado
    WHERE r.tipo_rep='reporte'";
    
    $consultaSug="SELECT r.*, l.nom_lab, u.nombre, u.apellido
    FROM reportes AS r
    INNER JOIN laboratorios AS l ON l.id_lab = r.id_lab_per
    INNER JOIN usuarios AS u ON l.id_lab = r.id_lab_per AND u.id = l.laboratorista_encargado
    WHERE r.tipo_rep='sugerencia'";
    $result1=$conn->query($consultaRep);
    if ($result1){
        $cont=1;
        ?>
        <div><h2 class="titulo">Reportes Realizados:</h2></div>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th scope="row"></th>
                        <th scope="col">Fecha/Hora</th>
                        <th scope="col">Descripción Del Reporte</th>
                        <th scope="col">Laboratorio</th>
                        <th scope="col">Cod. Bien</th>
                        <th scope="col">Emisor</th>
                        <th scope="col">Email Emisor</th>
                        <th scope="col">L. Responsable</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        while ($row=$result1->fetch_array()){
            $fec_rep = $row['fec_hora_rep'];
            $des_rep = $row['comen_rep'];
            $id_lab = $row['nom_lab'];
            $bien = $row['tipo_bien'].': '.$row['id_bien_rep'];
            $emi_sol = $row['ape_est'].' '.$row['nom_est'];
            $ema_dif = $row['cor_est'];
            $lab_res = $row['apellido'].' '.$row['nombre'];
            $est_rep = $row['estado_rep'];
            ?>
                <tr>
                    <td><?php echo $cont?></td>
                    <td><?php echo $fec_rep?></td>
                    <td><?php echo $des_rep?></td>
                    <td><?php echo $id_lab?></td>
                    <td><?php echo $bien?></td>
                    <td><?php echo $emi_sol?></td>
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
    }
        $result2=$conn->query($consultaSug);
        if ($result2){
            $cont=1;
            ?>
            <div><h2 class="titulo">Sugerencias Realizadas:</h2></div>
            <div class="table-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th scope="row"></th>
                            <th scope="col">Fecha/Hora</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Laboratorio</th>
                            <th scope="col">Emisor</th>
                            <th scope="col">Email Emisor</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
            while ($row=$result2->fetch_array()){
                $fec_rep = $row['fec_hora_rep'];
                $des_rep = $row['comen_rep'];
                $id_lab = $row['nom_lab'];
                $est_dif = $row['ape_est'].' '.$row['nom_est'];
                $ema_dif = $row['cor_est'];
                ?>
                    <tr><td><?php echo $cont?></td>
                    <td><?php echo $fec_rep?></td>
                    <td><?php echo $des_rep?></td>
                    <td><?php echo $id_lab?></td>
                    <td><?php echo $est_dif?></td>
                    <td><?php echo $ema_dif?></td>
                    </tr>
                <?php
                $cont++;
            }
            ?>
                </tbody>
                </table>
            </div>
            <?php
        }
?>