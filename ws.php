<?php
function Conectarse() 
{ 
   
   if (!($link=mysql_connect("localhost","k25216_troMe","devenew1"))) 
   { 
      echo '{"success":true, "data":[], "errors":"Error al conectar con la Base de Datos" }'; 
      exit(); 
   } 
   if (!mysql_select_db("k25216_escuela",$link)) 
   { 
      echo '{"success":true, "data":[], "errors":"Error seleccionando la base de datos" }'; 
      exit(); 
   } 
   return $link; 
} 


$metodo = $_GET["metodo"];


//seleccionamos la accion por metodo.

switch ($metodo) {
    case "get_lineas":
        get_lineas();
        break;
    case "get_estaciones":
        get_estaciones();
        break;
    case "get_posiciones":
        get_posiciones();
        break;
}


function get_lineas(){
    $idLinea = $_GET["idLinea"];
    
    
    $result=mysql_query($query,$link); 
    $rows = array();
echo json_encode($result);
    }


?>