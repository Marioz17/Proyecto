<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" type="text/css" href="style.php">
</head>

<body>

<?php 

$oMysql = new mysqli("localhost", "root", "", "proyectoo");
 // $conexion = pg_connect("host=localhost port=5432 user=nombreUsuario password=passwordUsuario dbname=nomBD", PGSQL_CONNECT_FORCE_NEW);
// $conexion = pg_connect("host=localhost dbname=BASE_DE_DATOS user=USUARIO password=CONTRASEÑA");		

$Query="UPDATE formulario 
					SET nombre= '".$_POST["NombreNuevo"]."' , 
					direccion= '".$_POST["Direccion"]."' , 
					telefono = '".$_POST["Telefono"]."', 
					email = '".$_POST["Email"]."'
					WHERE nombre = '".$_POST["NombreBuscar"]."'";
											
		  //$oMysql->query    seria como Objeto.metodo
$Result = $oMysql->query( $Query );  // se lanza la consulta

if($Result!=null)
   	print("Se modifico");

else
  	print("No se pudo modicar"); 
   ?>
  <center> <a href="Actualizar.php" class="boton">Regresar</a>
        <a href="administrador.php" class="boton">Salir</a></center>
</body>
</html>