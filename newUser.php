<?php
use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;

session_start();

require './vendor/autoload.php';

$auth = new Auth(
    Session::get('tenant_id'),
    Session::get('client_id'),
    Session::get('client_secret'),
    Session::get('redirect_uri'),
    Session::get('scopes')
);
$tokens = $auth->getToken($_REQUEST['code'], $_REQUEST['state']);

$accessToken = $tokens->access_token;

$auth->setAccessToken($accessToken);

//var_dump($tokens);
$user = new User();
//var_dump($user->data);
//echo 'Name: ' . $user->data->getDisplayName() . '<br>';
//echo 'Email: ' . $user->data->getUserPrincipalName() . '<br>';

$nombre = $user->data->getDisplayName();
$email = $user->data->getUserPrincipalName();
$p_nombre = $user->data->getgivenName();
$apellido = $user->data->getsurname();


include 'header.php'; 

include 'home.html';

include 'db.php';
// Verificar si el usuario ya existe antes de realizar la inserción
$consulta_existencia = "SELECT * FROM estudiantes WHERE correo='$email'";
$resultado_existencia = mysqli_query($conexion, $consulta_existencia);

if (mysqli_num_rows($resultado_existencia) == 0) {
    // El usuario no existe, proceder con la inserción
    $insercion = "INSERT INTO estudiantes (correo, nombre, apellido) VALUES ('$email', '$p_nombre', '$apellido')";
    
    if (mysqli_query($conexion, $insercion)) {
        //echo "Datos insertados correctamente.";
    } else {
        //echo "Error al insertar datos: " . mysqli_error($conexion);
    }
} else {
    //echo "El usuario ya existe en la base de datos.";
}

// Cerrar la conexión a la base de datos al finalizar
mysqli_close($conexion);

$_SESSION['nombre'] = $nombre;
$_SESSION['email'] = $email;
$_SESSION['p_nombre'] = $p_nombre;
$_SESSION['apellido'] = $apellido;

?>


