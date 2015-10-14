<?php
error_reporting(0);
include("conexion.php");
 
// array for JSON response
$response = array();
    $email=$_POST['email'];


if(!(empty($email)))
{
   
    $result = mysql_query("select * from usuario where nombre = '$email';");    


while ($row = mysql_fetch_assoc($result)) 
{
    $arr = array();
    $arr["correo"] = $row["correo"];
    $arr["mail"] = $row["mail"];
    $arr["nombre"] = $row["nombre"];
    $arr["apellido"] = $row["apellido"];
    $arr["genero"] = $row["genero"];
    $arr["anio"] = $row["anio"];
    $arr["celular"] = $row["celular"];
      
     $response[] = $arr;
}
    
     echo json_encode($response);
 }
 else{
 	echo json_encode($response);
 }

?>