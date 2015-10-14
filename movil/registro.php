<?php
error_reporting(0);
include("db_config.php");

// array for JSON response
$response = array();

    $nombre=$_POST['usuario'];
    $correo=$_POST['email'];
    $mail=$_POST['email'];
    $celular=$_POST['telefono'];
    $imagen=$_POST['foto'];

if( !(empty($nombre)) && !(empty($correo)))
{
 mysql_query("INSERT INTO usuario (correo, mail, nombre, apellido, genero, ano, celular,pass) VALUES (0,'hackro91','hackro91','david','hackro','masculino',1998,'2222708631',' ')");  

 
}
?>