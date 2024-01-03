<?php
include 'conexion.php'; 

$query = "SELECT * FROM laboratoristas";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            "ced_lab" => $row['ced_lab'],
            "nom_lab" => $row['nom_lab'],
            "ape_lab" => $row['ape_lab'],
            "dir_lab" => $row['dir_lab'],
            "tel_lab" => $row['tel_lab'],
            "sex_lab" => $row['sex_lab']
        );
    }
    echo json_encode($data);
} else {
    echo json_encode([]); // Si no hay resultados, devolver un array vacío
}

$conn->close();
?>
