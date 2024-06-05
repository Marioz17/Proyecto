<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="elistyle.php">
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
$nom = $_GET['Nombre'];
?>

<center>
    <h1>¿Estás seguro de eliminarlo?</h1>
    <br><br>
    <a class="boton" href="eliminacion_si.php?Nombre=<?php echo $nom; ?>">Si</a>
    <a class="boton" href="eliminar.php">No</a>
</center>

<br><br>

<center>
    <a class="boton" href="administrador.php">Salir</a>
</center>

</body>
</html>

