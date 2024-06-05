<?php 
//Busca registro  a través del nombre elegido
$nombreBuscar=$_GET["Nombre"];
$oMysql = new mysqli("localhost", "root", "", "proyectoo");
$Query="select * from formulario WHERE nombre = '".$nombreBuscar."'";
$Result = $oMysql->query( $Query );

if($Result==null)
   	print("No se  encontra el registro");
else{
      $row =$Result->fetch_array();
  	  $direccion=$row["direccion"];
	  $telefono=$row["telefono"];
	  $email=$row["email"];
	}
?>