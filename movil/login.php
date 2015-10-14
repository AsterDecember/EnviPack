<?php
error_reporting(0);
include("conexion.php");
header('Content-type:application/json;charset=utf-8');
// array for JSON response


if( !(empty($_POST['email'])))
{
    $email=$_POST['email'];

    $result = mysql_query("SELECT * FROM usuario WHERE nombre =  '$email'");    
    $count=mysql_num_rows($result);
    if($count>0){
           $response = 1;
         }    
     else{
           $response = 0;
         }
     // echoing JSON response
     echo json_encode($response);
}

?>