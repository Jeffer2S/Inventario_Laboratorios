<?php
include 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['id_bien']) && !empty($_POST['id_bien'])) {
    // Se ingresó un ID del Bien, se inserta solo un Bien
    $id_bien = $_POST['id_bien'];
    $tipo_bien = $_POST['tipo_bien'];
    $est_bien = $_POST['est_bien'];
    $lab_per = $_POST['lab_per'];
    $ocupado = 1;

    $sqlInsertar = "INSERT INTO bienes (id_bien, tipo_bien, est_bien, ocupado, id_lab_per) VALUES ('$id_bien', '$tipo_bien', '$est_bien', '$ocupado', '$lab_per')";

    if ($conn->query($sqlInsertar) !== TRUE) {
      echo json_encode("Error al insertar: " . $conn->error);
    } else {
      $_SESSION['mensaje'] = "Se guardó exitosamente el registro.";
      header("Location: insertarBien.php");
    }
  } elseif (isset($_POST['cantidad']) && !empty($_POST['cantidad'])) {
    // Se ingresó una Cantidad, se inserta múltiples bienes
    $cantidad = $_POST['cantidad'];
    $tipo_bien = $_POST['tipo_bien'];
    $est_bien = $_POST['est_bien'];
    $lab_per = $_POST['lab_per'];
    $ocupado = 1;

    for ($i = 0; $i < $cantidad; $i++) {
      $id_bien = generateRandomString(); // Generar ID del Bien aleatorio
      $sqlInsertar = "INSERT INTO bienes (id_bien, tipo_bien, est_bien, ocupado, id_lab_per) VALUES ('$id_bien', '$tipo_bien', '$est_bien', '$ocupado', '$lab_per')";

      if ($conn->query($sqlInsertar) !== TRUE) {
        echo json_encode("Error al insertar: " . $conn->error);
        break;
      }
    }

    if ($i === $cantidad) {
      $_SESSION['mensaje'] = "Se guardaron exitosamente $cantidad registros.";
      header("Location: insertarBien.php");
    }
  } else {
    echo json_encode("Ingrese un ID del Bien o una Cantidad.");
  }
}

$conn->close();

function generateRandomString($length = 7) {
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, strlen($characters) - 1)];
  }
  return $randomString;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de inserción de bienes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
body {
  font-family: Arial, sans-serif;
  background-color: #f5fac1; /* Fondo principal */
  padding: 20px;
  margin: 0;
}

form {
  max-width: 500px;
  margin: 0 auto;
  background-color: #ebf3a0; /* Fondo formulario */
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

legend {
  text-align: center;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}



label {
  font-weight: bold;
}

input[type="text"],
select {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px 20px;
  background-color: #ff9688;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 20px;
}

button[type="submit"]:hover {
  background-color: #ff6961;
}

.mensaje-exito {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #8cfca4;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); 
  z-index: 9999;
}

.mensaje-exito p {
  margin: 0;
  font-size: 18px;
  color: rgb(0, 0, 0); /* Cambio de color de texto para mejor legibilidad */
}


.center-div {
  text-align: center;
}

.center-div button {
  display: block;
  margin: 0 auto;
  background-color: #ff9688; /* Color inicial del botón */
  border: none; /* Opcional: quitar el borde */
  color: white; /* Color del texto */
  padding: 10px 20px; /* Ajustar el espaciado */
  border-radius: 4px; /* Ajustar esquinas redondeadas */
  transition: background-color 0.3s ease; /* Transición suave */
}

.center-div button:hover {
  background-color: #ff6961; /* Color al pasar el mouse */
}

    </style>
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
                  <option value="pantalla">Pantalla</option>
                  <option value="teclado">Teclado</option>
                  <option value="mouse">Mouse</option>
                  <option value="mesa">Mesa</option>
                  <option value="silla">Silla</option>
                  <option value="cortina">Cortina</option>
                  <option value="proyector">Proyector</option>
                  <option value="regulador">Regulador</option>
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
  <label for="cantidad" class="form-label">Cantidad:</label>
  <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese la cantidad" min="1">
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
          <button type="submit" class="btn btn-primary" onclick="mostrarMensajeExito()">Enviar Datos</button>
        </fieldset>
      </form>

      <div id="mensaje-exito" class="mensaje-exito" style="display: none;"></div>

      <script>
        function cambiarImagen() {
          var select = document.getElementById("tipo_bien");
          var imagen = document.getElementById("imagen_bien");
          var opcionSeleccionada = select.value;

          var rutaImagen = "";
         
          if (opcionSeleccionada === "computador") {
            rutaImagen = "imagenes/computador.png";
          } else if (opcionSeleccionada === "pantalla") {
            rutaImagen = "imagenes/pantalla.png";
          } else if (opcionSeleccionada === "teclado") {
            rutaImagen = "imagenes/teclado.png";
          } else if (opcionSeleccionada === "mouse") {
            rutaImagen = "imagenes/mouse.png";
          } else if (opcionSeleccionada === "mesa") {
            rutaImagen = "imagenes/mesa.png";
          } else if (opcionSeleccionada === "silla") {
            rutaImagen = "imagenes/silla.png";
          } else if (opcionSeleccionada === "cortina") {
            rutaImagen = "imagenes/cortina.jpg";
          } else if (opcionSeleccionada === "proyector") {
            rutaImagen = "imagenes/proyector.png";
          } else if (opcionSeleccionada === "regulador") {
            rutaImagen = "imagenes/regulador.webp";
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
      <script>
            function mostrarMensajeExito() {
        const mensajeExito = document.getElementById('mensaje-exito');
        mensajeExito.innerText = 'Se guardo con exito.';
        mensajeExito.style.display = 'block';
    }
      </script>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>
