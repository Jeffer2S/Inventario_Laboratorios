<?php
    require 'Mysql/conexion.php';    
    $consulta=" SELECT l.*, u.apellido, u.nombre
    FROM laboratorios AS l
    INNER JOIN usuarios AS u ON l.laboratorista_encargado=u.id";
    $result=$conn->query($consulta);
    if ($result){
        ?>
        <head>
            <link rel="stylesheet" href="./css/estilosLaboratorios.css">
        </head>
        <div class="contenedor-principal">
        <div class="contenedor">
        <?php
        while ($row=$result->fetch_array()){
            $num_lab = $row['id_lab'];
            $nom_lab = $row['nom_lab'];
            $edi_lab = $row['ed_lab'];
            $pis_lab = $row['piso_lab'];
            $lab_enc = $row['apellido'].' '.$row['nombre'];
            ?>
                <div class="cuadro-contenedor" onclick="mostrarInformacion(<?php echo $num_lab?>, this)">
                <div> 
                    <div class="texto-lab">
                        <p><?php echo $nom_lab?></p>
                    </div>
                    <br>
                    <p><b>Ubicación: </b><?php echo $edi_lab.' piso '.$pis_lab?></p>
                    <p><b>L. Encargado:</b> <?php echo $lab_enc; ?></p>
                </div>
                <div class="informacionAdicional">
                    <div class="texto-lab">
                        <h3><?php echo $nom_lab?></h3>
                    </div>
                <div class="cuadrosAdicionales">
                <?php 
                $consulta_bienes = " SELECT * FROM bienes
                WHERE id_lab_per= $num_lab
                AND tipo_bien <> 'SILLA'
                ORDER BY tipo_bien Desc";
                $result2=$conn->query($consulta_bienes);
                $contP=0;
                $contPC=0;
                $contU=0;
                    while($row2=$result2->fetch_array()){
                        if($row2['tipo_bien'] == 'PROYECTOR'){
                            if($contP==0){
                                ?>
                                <div><p><b>PROYECTORES:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </p></div>
                                <?php
                                $contP++;
                            }
                            ?>
                            <br>
                                <div class="cuadroAdicional">
                                <?php echo 'Cod: '.$row2['id_bien']?> <br>
                                <?php echo 'Marca: '.$row2['marca_bien']?> <br>
                                <?php echo 'Estado: '.$row2['est_bien']?> <br>
                                </div>
                            <?php
                        }
                        else if($row2['tipo_bien'] == 'PC' || $row2['tipo_bien'] == 'Computadora'){
                            if($contPC==0){
                                ?>
                                <div class="texto-lab"><p>
                                <b>PCs:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </p></div>
                                <?php
                                $contPC++;
                            }
                            ?> 
                            <br>    
                            <div class="cuadroAdicionalPc">
                            <?php echo 'Cod: '.$row2['id_bien']?>
                            <?php echo 'Marca: '.$row2['marca_bien']?>
                            <?php echo 'Estado: '.$row2['est_bien']?>
                            </div><?php
                        } else{
                            if($contU==0){
                                ?>
                                <div class="texto-lab"><p>
                                <b>Pertenencias:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </p></div>
                                <?php
                                $contU++;
                            }
                            ?> 
                            <div class="cuadroAdicional">
                            <?php 
                            echo 'Tipo: '.$row2['tipo_bien']?> <br>    
                            <?php echo 'Cod: '.$row2['id_bien']?> <br>
                            <?php echo 'Estado: '.$row2['est_bien']?> <br>
                            </div><?php
                            $consulta_sillas = " SELECT * FROM bienes
                            WHERE id_lab_per= $num_lab
                            AND tipo_bien = 'SILLA'";
                            $result3=$conn->query($consulta_sillas);
                            if($contU==1){
                                while ($row3=$result3->fetch_array()){
                                    ?>
                                    <div class="cuadroAdicional">
                                    <?php echo 'Tipo: '.$row3['tipo_bien']?>   <br> 
                                    <?php echo 'Cod: '.$row3['id_bien']?> <br>
                                    <?php echo 'Estado: '.$row3 ['est_bien']?> <br>
                                    </div><?php    
                                }
                                $contU++;
                            }
                        }
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
            <script>
                let cuadroSeleccionado = 0;
                let cuadroActual = null;

                function mostrarInformacion(numeroCuadro, cuadroContenedor) {
                const informacionAdicionales = document.querySelectorAll('.informacionAdicional');

                if (cuadroSeleccionado === numeroCuadro) {
                    cuadroSeleccionado = 0;
                    cuadroActual.classList.remove('destacado');
                    cuadroActual = null;
                } else {
                    cuadroSeleccionado = numeroCuadro;

                    informacionAdicionales.forEach(info => {
                    info.parentNode.classList.remove('destacado');
                    });

                    cuadroActual = cuadroContenedor;
                    cuadroActual.classList.add('destacado');
                }
                }
            </script>
            <?php
    }    
?>