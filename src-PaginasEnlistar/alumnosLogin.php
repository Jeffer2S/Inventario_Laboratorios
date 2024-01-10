<?php
    ?>
    <head>
        <link rel="stylesheet" href="./css/estilosUsuarios.css">
    </head>
    <?php
    require 'Mysql/conexion.php';    
    $consulta = "SELECT correo, nombre, apellido FROM estudiantes";
    $result = $conn->query($consulta);
    $cont = 1;
    if ($result){
        ?>
        <h2 class="titulo">ALUMNOS LOGEADOS</h2>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th scope="row"></th>
                        <th scope="col">Correo</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        while ($row = $result->fetch_array()){
            $correo = $row['correo'];
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];

            ?>
                <tr>
                    <td><?php echo $cont?></td>
                    <td><?php echo $correo?></td>
                    <td><?php echo $apellido?></td>
                    <td><?php echo $nombre?></td>
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
