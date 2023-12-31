<?php
    require './Mysql/conexion.php';    
    $consulta="SELECT c.id_pc, c.mar_pc, c.ubi_pc, l.num_labo, l.nom_labo,  
    FROM laboratorios AS l 
    INNER JOIN computadoras AS c ON l.id_labo = c.id_lab_per";
    $result=$conn->query($consulta);
    if ($result){
        while ($row=$result->fetch_array()){
        }
    }
?>