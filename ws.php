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
//seleccionamos la accion por metodo.

switch ($metodo) {
    case "get_linea":
		get_linea();
        break;
    case "get_lineas":
        get_lineas();
        break;
    case "get_posiciones":
        get_posiciones();
        break;
}


function get_linea(){
$idLinea = $_GET["idLinea"];
	if(evalParam($idLinea)){
		$query = "SELECT * FROM  `lineas` where id=".$idLinea ;
		echo getSqlToJson($query);
	}
    }
function get_lineas(){
		
		$query = "Select * from lineas";
		echo getSqlToJson($query);
	}

function evalParam($param){
 if(strrpos(strtoupper($param), "SELECT") === false && strrpos(strtoupper($param), "INSERT") === false && strrpos(strtoupper($param), "UPDATE") === false && strrpos(strtoupper($param), "DELETE") === false && strrpos(strtoupper($param), "DROP") === false  )
 {
 return true; //El parametro es Valido
 
 }else{
 return false; //El parametro no es Valido
 }

}	
function getSqlToJson($query){
		$link = Conectarse();
		$result=mysql_query($query,$link); 
		$rows = array();
		while($r = mysql_fetch_assoc($result)) {
			$rows[] = $r;
		}
		return json_encode($rows);
}
	
?>