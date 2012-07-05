<?php
function Conectarse() 
{ 
   
   if (!($link=mysql_connect("localhost","root","devenew1"))) 
   { 
      echo '{"success":true, "data":[], "errors":"Error al conectar con la Base de Datos" }'; 
      exit(); 
   } 
   if (!mysql_select_db("metro",$link)) 
   { 
      echo '{"success":true, "data":[], "errors":"Error seleccionando la base de datos" }'; 
      exit(); 
   } 
   return $link; 
} 


$metodo = $_GET["metodo"];

echo $metodo;
//seleccionamos la accion por metodo.

switch ($metodo) {
    case "get_linea":
		echo "entro";
        get_linea();
        break;
    case "get_estaciones":
        get_estaciones();
        break;
    case "get_posiciones":
        get_posiciones();
        break;
}


function get_linea(){
$idLinea = $_GET["idLinea"];
echo $idLinea;
	if(evalParam($idLinea)){
		$link = Conectarse();
		$query = "Select * from lineas where id=".$idLinea ;
		$result=mysql_query($query,$link); 
		$rows = array();
		echo json_encode($result);
	}
    }
function get_lineas(){
	
    $idLinea = $_GET["idLinea"];
	if(evalParam($idLinea)){
		$link = Conectarse();
		$query = "Select * from Lineas where id=".$idLinea ;
		$result=mysql_query($query,$link); 
		$rows = array();
		echo json_encode($result);
	}
	
    }

function evalParam($param){
 if(strrpos(strtoupper($param), "SELECT") === false && strrpos(strtoupper($param), "INSERT") === false && strrpos(strtoupper($param), "UPDATE") === false && strrpos(strtoupper($param), "DELETE") === false && strrpos(strtoupper($param), "DROP") === false  )
 {
 return true; //El parametro es Valido
 
 }else{
 return false; //El parametro no es Valido
 }

}	
	
	
?>