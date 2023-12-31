<?php
    require './Mysql/conexion.php';    
    $consulta="SELECT r.num_rec, r.des_rec, l.nom_labo FROM recomendaciones AS r
    INNER JOIN laboratorios AS l ON r.num_lab_per = l.num_labo";
    $result=$conn->query($consulta);
    if ($result){
        while ($row=$result->fetch_array()){

        }
    }
?>