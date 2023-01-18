<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include_once 'conexion.php';
session_start();

$username = $_POST['usuario'];
$password = $_POST['clave'];


$sql= "SELECT * FROM usuarios WHERE usuario='$username' AND clave='$password'";
$sqlnom = "SELECT nombre FROM usuarios WHERE usuario='$username' AND clave='$password'";
$sqlape = "SELECT apellido FROM usuarios WHERE usuario='$username' AND clave='$password'";

$respuesta = $conection -> query ($sql);
$respuestanom = $conection -> query ($sqlnom);
$respuestaape = $conection -> query ($sqlape);
    $result = array();

    if ( $respuesta -> num_rows > 0 ){
        while ( $fila = $respuesta-> fetch_assoc()){
            array_push($result, $fila);     
            $_SESSION['user'] = $username;    
            $_SESSION['nombre'] = $respuestanom->fetch_array()[0]??'';
            $_SESSION['apellido'] = $respuestaape->fetch_array()[0]??'';
        }
    }else{
        $result=null;
    }

$resultJSON = json_encode($result);
//echo $resultJSON;
return $resultJSON;
?>