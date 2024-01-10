<?php
include('db.php');
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $usuario;

$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas) {
    
    $_SESSION['idUsuario'] = $filas['id'];

    if ($filas['id_cargo'] == 1) { //administrador
        header("location: homeAdmin.html");
    } elseif ($filas['id_cargo'] == 2) { //laboratorista
        $idUsuarioEncargado = obtenerIdUsuarioEncargado($filas['usuario']);
        if ($idUsuarioEncargado) {
            $_SESSION['idUsuarioEncargado'] = $idUsuarioEncargado;
            header("location: homeLabo.html");
        } else {
            include("index.html");
            echo '<h1 class="bad">Error</h1>';
        }
    } else {
        include("index.html");
        echo '<h1 class="bad">DATOS ERRONEOS</h1>';
    }
} else {
    include("index.html");
    echo '<h1 class="bad">DATOS ERRONEOS</h1>';
}

mysqli_free_result($resultado);
mysqli_close($conexion);

function obtenerIdUsuarioEncargado($nombreUsuario)
{
    global $conexion;

    $consulta = "SELECT id FROM usuarios WHERE usuario = '$nombreUsuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($fila = mysqli_fetch_array($resultado)) {
        return $fila['id'];
    } else {
        return null;
    }
}
?>
