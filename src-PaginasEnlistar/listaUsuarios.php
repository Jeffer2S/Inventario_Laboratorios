<?php
    ?>
    <head>
        <link rel="stylesheet" href="./src-PaginasEnlistar/css/estilosUsuarios.css">
    </head>
    <?php
    require 'Mysql/conexion.php';    
    $consulta="SELECT u.*, c.descripcion
    FROM usuarios AS u
    INNER JOIN cargo AS c ON u.id_cargo = c.id
    ORDER BY u.apellido;";
    $result=$conn->query($consulta);
    $cont =1;
    if ($result){
        ?>
        <h2 class="titulo">USUARIOS</h2>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th scope="row"></th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Username</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Telefono</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        while ($row=$result->fetch_array()){
            $ced_usu = $row['id'];
            $nom_usu = $row['nombre'];
            $ape_usu = $row['apellido'];
            $usu_usu = $row['usuario'];
            $con_usu = $row['contraseña'];
            $dir_usu = $row['direccion'];
            $tel_usu = $row['telefono'];
            $car_usu = $row['descripcion'];

            ?>
                <tr><td><?php echo $cont?></td>
                <td><?php echo $ced_usu?></td>
                <td><?php echo $ape_usu?></td>
                <td><?php echo $nom_usu?></td>
                <td><?php echo $usu_usu?></td>
                <td><?php echo $con_usu?></td>
                <td><?php echo $car_usu?></td>
                <td><?php echo $dir_usu?></td>
                <td><?php echo $tel_usu?></td></tr>
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