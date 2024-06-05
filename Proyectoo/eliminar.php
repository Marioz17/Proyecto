<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" type="text/css" href="elstyle.php">
</head>

<body>

<H1><CENTER>CONSULTA DATOS DE REGISTRO</CENTER></H1>


<?php 
$mysql = new mysqli("localhost", "root", "", "proyectoo");

$Query = "SELECT * FROM formulario";
$Result = $mysql->query($Query);

$numeroRegistros = $Result->num_rows;
if($numeroRegistros <= 0) { 
    echo "<div align='center'>"; 
    echo "<h2>No se encontraron registros</h2>"; 
    echo "</div><hr>"; 
} else {
?>

<table border="1" align="center">
    <tr>
        <td><strong>Nombre</strong></td>
        <td><strong>Dirección</strong></td>
        <td><strong>Teléfono</strong></td>
        <td><strong>Email</strong></td>
    </tr>
    <?php
    while($row = $Result->fetch_array()) {	  
        $nom = $row["nombre"];
    ?>
    <tr>
        <td><?php echo $nom; ?></td>
        <td><?php echo $row["direccion"]; ?></td>
        <td><?php echo $row["telefono"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><a href="eliminacion.php?Nombre=<?php echo $nom; ?>"><img src="eliminar.png" width="20px" alt="Eliminar"></a></td>
    </tr>
    <?php
    }
}
?>
</table>
<br>
<center><a href="administrador.php" class="boton">VOLVER</a></center>
</body>
</html>
