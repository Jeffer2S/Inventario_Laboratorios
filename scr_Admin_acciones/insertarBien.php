<?php
include 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_bien'])) {
    $id_bien = $_POST['id_bien'];
    $tipo_bien = $_POST['tipo_bien'];
    $est_bien = $_POST['est_bien'];
    $lab_per = $_POST['lab_per'];
    $ocupado = 1; 

    $sqlInsertar = "INSERT INTO bienes VALUES ('$id_bien', ' $tipo_bien', '$est_bien','$ocupado', '$lab_per')";

    if ($conn->query($sqlInsertar) === TRUE) {
        $_SESSION['mensaje'] = "Se guardó exitosamente."; 
        header("Location: insertarBien.php"); 
    } else {
        echo json_encode("Error al insertar: " . $conn->error); 
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de inserción de bienes</title>
  <link rel="stylesheet" href="estilos_Admin_acciones.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <form id="myForm" action="insertarBien.php" method="POST">
        <fieldset>
          <legend>Ingrese el Bien</legend>
          <div class="mb-3">
            <label for="id_bien" class="form-label">ID del Bien:</label>
            <input type="text" id="id_bien" name="id_bien" class="form-control" placeholder="Ingrese ID del bien">
          </div>
          <div class="mb-3">
            <label for="tipo_bien" class="form-label">Nombre del Bien:</label>
            <div class="row">
              <div class="col text-center">
                <select id="tipo_bien" name="tipo_bien" class="form-select" onchange="cambiarImagen()">
                  <option value="">Seleccione un bien</option>
                  <option value="computador">Computador</option>
                  <option value="Pantalla">Pantalla</option>
                  <option value="teclado">Teclado</option>
                  <option value="mouse">Mouse</option>
                  <option value="mesa">Mesa</option>
                  <option value="silla">Silla</option>
                </select>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col d-flex justify-content-center">
                <img src="" alt="Imagen del Bien" id="imagen_bien" style="max-width: 100px; max-height: 100px; display: none;">
              </div>
            </div>
          </div>
                  
          <div class="mb-3">
            <label for="est_bien" class="form-label">Estado del Bien:</label>
            <select id="est_bien" name="est_bien" class="form-select">
              <option value="Nuevo">Nuevo</option>
              <option value="Buen Estado">Buen Estado</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="lab_per" class="form-label">Laboratorio asignado:</label>
            <select id="lab_per" name="lab_per" class="form-select">
              <?php
              include 'conexion.php';
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
      
              $query = "SELECT id_lab, nom_lab FROM laboratorios";
              $result = $conn->query($query);
      
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['id_lab'] . "'>" . $row['nom_lab'] . "</option>";
                }
              } else {
                echo "<option value=''>No hay laboratorios disponibles</option>";
              }
      
              $conn->close();
              ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Enviar Datos</button>
        </fieldset>
      </form>

      <script>
        function cambiarImagen() {
          var select = document.getElementById("tipo_bien");
          var imagen = document.getElementById("imagen_bien");
          var opcionSeleccionada = select.value;

          var rutaImagen = "";
         
          if (opcionSeleccionada === "computador") {
            rutaImagen = "imagenes/computador.png";
          } else if (opcionSeleccionada === "Pantalla") {
            rutaImagen = "imagenes/pantalla.png";
          } else if (opcionSeleccionada === "teclado") {
            rutaImagen = "imagenes/teclado.png";
          } else if (opcionSeleccionada === "mouse") {
            rutaImagen = "imagenes/mouse.png";
          } else if (opcionSeleccionada === "mesa") {
            rutaImagen = "imagenes/mesa.png";
          } else if (opcionSeleccionada === "sillas") {
            rutaImagen = "imagenes/silla.png";
          }

          if (rutaImagen !== "") {
            imagen.src = rutaImagen;
            imagen.style.display = "block"; 
          } else {
            imagen.src = ""; 
            imagen.style.display = "none"; 
          }
        }
      </script>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>
