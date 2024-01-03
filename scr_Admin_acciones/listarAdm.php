<?php
include 'conexion.php'; 

$query = "SELECT * FROM usuarios WHERE id_cargo = 1"; 

$result = $conn->query($query);

$data = array(); 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            "id" => $row['id'],
            "nombre" => $row['nombre'],
            "apellido" => $row['apellido'],
            "direccion" => $row['direccion'],
            "telefono" => $row['telefono']
        );
    }
}

echo json_encode($data);

$conn->close();
?>
