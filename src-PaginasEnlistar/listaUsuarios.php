<?php
    require './Mysql/conexion.php';    
    $consulta="SELECT * FROM Usuarios";
    $result=$conn->query($consulta);
    $cont =1;
    if ($result){
        ?>
        <div>
            <table>
                <thead>
                    <tr>
                        <th scope="row"></th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Telefono</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        while ($row=$result->fetch_array()){
            $ced_lab = $row['ced_lab'];
            $nom_lab = $row['nom_lab'];
            $ape_lab = $row['ape_lab'];
            $dir_lab = $row['dir_lab'];
            $tel_lab = $row['tel_lab'];
            $sex_lab = $row['sex_lab'];
            ?>
                <td><?php echo $ced_lab?></td>
                <td><?php echo $nom_lab?></td>
                <td><?php echo $ape_lab?></td>
                <td><?php echo $dir_lab?></td>
                <td><?php echo $tel_lab?></td>
                <td><?php echo $sex_lab?></td>
            <?php
        }
        ?>
            </tbody>
            </table>
        </div>
        <?php
    }
?>