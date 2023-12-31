<?php
    require './Mysql/conexion.php';    
    $consulta="SELECT num_labo, nom_labo, pis_labo FROM laboratorios";
    $consultaLabor="SELECT nom_lab, ape_lab FROM laboratoristas WHERE 
    ced_lab in (SELECT ced_lab_enc FROM laboratorios WHERE num_lab=$num_lab";
    $consultaPc="SELECT * FROM computadoras where num_lab_per=$num_lab";
    $result=$conn->query($consulta);
    if ($result){
        ?>
        <div class="contenedor-principal">
        <div class="contenedor">
        <?php
        while ($row=$result->fetch_array()){
            $num_lab = $row['num_labo'];
            $nom_lab = $row['nom_labo'];
            $pis_lab = $row['pis_labo'];

            ?>
                <div class="cuadro-contenedor" onclick="mostrarInformacion(<?php $num_lab?>, this)">
                <div> 
                    <?php echo $nom_lab?>
                    <?php echo $pis_lab?>
                    <p>Laboratoristas Encargados:</p>
                    <?php $result1=$conn->query($consultaLabor);
                    while ($row1=$result1->fetch_array()){
                      echo $row1['nom_lab'];
                      echo $row1['ape_lab'];  
                    }
                    ?>
                </div>
                <div class="informacionAdicional">
                <h2><?php echo $nom_lab?></h2>
                <div class="cuadrosAdicionales">
                <?php $result2=$conn->query($consultaPc);
                    while($row2=$result2->fetch_array()){
                        ?> <div class="cuadroAdicional">
                            <?php echo $row2['num_Con']?>
                            <?php echo $row2['cod_Con']?>
                            <?php echo $row2['mar_Con']?>
                        </div><?php
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
            </body>
            </html>
            <?php
    }    
?>