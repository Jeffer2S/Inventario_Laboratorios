<?php
    require './Mysql/conexion.php';    
    $consulta="SELECT * FROM Usuarios";
    $result=$conn->query($consulta);
    if ($result){
        while ($row=$result->fetch_array()){
            
        }
    }
?>