<?php
    require './Mysql/conexion.php';    
    $consulta="SELECT r.num_rec, r.des_rec, l.nom_labo FROM recomendaciones AS r
    INNER JOIN laboratorios AS l ON r.num_lab_per = l.num_labo";
    $result=$conn->query($consulta);
    if ($result){
        ?>
        <div>
            <table>
                <thead>
                    <tr>
                        <th scope="row"></th>
                        <th scope="col">Laboratorio</th>
                        <th scope="col">Recomendación</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        while ($row=$result->fetch_array()){
            $num_rec = $row['r.num_rec'];
            $nom_lab = $row['l.nom_labo'];
            $des_rec = $row['r.des_rec'];
            ?>
                <td><?php echo $num_rec?></td>
                <td><?php echo $nom_lab?></td>
                <td><?php echo $des_rec?></td>
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