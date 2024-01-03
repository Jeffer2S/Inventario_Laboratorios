<?php
include('db.php');
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $usuario;

$consulta = "SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas['id_cargo'] == 1) { //administrador
    header("location:homeAdmin.html");
} else
if ($filas['id_cargo'] == 2) { //laboratorista
    header("location:homeLabo.html");
} else {
    include("index.html");
?>
    <h1 class="bad">DATOS ERRONEOS</h1>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
