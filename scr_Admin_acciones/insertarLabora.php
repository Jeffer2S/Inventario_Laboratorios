<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom_lab'], $_POST['piso_lab'], $_POST['laboratorista_encargado'])) {
        $nom_lab = $_POST['nom_lab'];
        $piso_lab = $_POST['piso_lab'];
        $ed_lab = $_POST['ed_lab']; 
        $laboratorista_encargado = $_POST['laboratorista_encargado'];

        $sqlInsertar = "INSERT INTO laboratorios (nom_lab, piso_lab, ed_lab, laboratorista_encargado) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sqlInsertar);
        $stmt->bind_param("sssi", $nom_lab, $piso_lab, $ed_lab, $laboratorista_encargado);

        if ($stmt->execute()) {
            $id_lab = $stmt->insert_id;
            $stmt->close();
        } else {
            echo "Error al insertar datos: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
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

<form id="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <fieldset>
    <legend> Datos del Laboratorio</legend>
    <br>
    <div class="mb-3">
      <label for="nom_lab" class="form-label">Nombre del Laboratorio: </label>
      <input type="text" id="nom_lab" name="nom_lab" class="form-control" placeholder="Ingrese nombre del laboratorio">
    </div>
    <br>
    <div class="mb-3">
      <label for="piso_lab" class="form-label">Piso: </label>
      <select id="piso_lab" name="piso_lab" class="form-select">
        <option value="Planta Baja">Planta Baja</option>
        <option value="Primer Piso">Primer Piso</option>
        <option value="Segundo Piso">Segundo Piso</option>
        <option value="Tercer Piso">Tercer Piso</option>
      </select>
    </div>
    <br>
    <div class="mb-3">
      <label for="ed_lab" class="form-label">Edificio: </label>
      <select id="ed_lab" name="ed_lab" class="form-select">
        <option value="Principal">Principal</option>
        <option value="Secundario">Secundario</option>
      </select>
    </div>
    <br>
    <div class="mb-3">
      <label for="laboratorista_encargado" class="form-label">Laboratorista Encargado: </label>
      <select id="laboratorista_encargado" name="laboratorista_encargado" class="form-select">
        <?php
        $query = "SELECT id, nombre FROM usuarios WHERE id_cargo = 2";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
          }
        } else {
          echo "<option value=''>No hay laboratoristas disponibles</option>";
        }
        ?>
      </select>
    </div>
    <br>
    <div class="center-div">
      <button type="submit" onclick="mostrarMensajeExito()" class="btn btn-success">Enviar Datos</button>
    </div>
  </fieldset>
</form>

<div id="mensaje-exito" class="mensaje-exito" style="display: none;"></div>

<script>
    function mostrarMensajeExito() {
        const mensajeExito = document.getElementById('mensaje-exito');
        mensajeExito.innerText = 'Se creó exitosamente el laboratorio.';
        mensajeExito.style.display = 'block';
    }
</script>
</body>
</html>
