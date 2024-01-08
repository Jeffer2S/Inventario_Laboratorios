<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom_lab'], $_POST['piso_lab'], $_POST['laboratorista_encargado'])) {
        $nom_lab = $_POST['nom_lab'];
        $piso_lab = $_POST['piso_lab'];
        $laboratorista_encargado = $_POST['laboratorista_encargado'];

        $sqlInsertar = "INSERT INTO laboratorios (nom_lab, piso_lab, laboratorista_encargado) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sqlInsertar);
        $stmt->bind_param("sss", $nom_lab, $piso_lab, $laboratorista_encargado);

        if ($stmt->execute()) {
            $id_lab = $stmt->insert_id;
            header("Location: ../homeAdmin.html");
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
  <link rel="stylesheet" href="estilos_Admin_acciones.css">
</head>
<body>

<form id="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <fieldset>
    <legend> Datos del Laboratorio</legend>
    <div class="mb-3">
      <label for="nom_lab" class="form-label">Nombre del Laboratorio: </label>
      <input type="text" id="nom_lab" name="nom_lab" class="form-control" placeholder="Ingrese nombre del laboratorio">
    </div>
    <div class="mb-3">
      <label for="piso_lab" class="form-label">Piso: </label>
      <input type="text" id="piso_lab" name="piso_lab" class="form-control" placeholder="Ingrese el piso">
    </div>
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
    <div class="text-center">
      <button type="submit" class="btn btn-success">Enviar Datos</button>
    </div>
  </fieldset>
</form>

</body>
</html>
