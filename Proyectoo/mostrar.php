<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="mostyle.php">
</head>

<body>

<h1>CONSULTA DATOS DE REGISTRO</h1>

<?php 
$mysql = new mysqli("localhost", "root", "", "proyectoo");
$Query = "SELECT * FROM usuarios";
$Result = $mysql->query($Query);

$numeroRegistros = $Result->num_rows;
if($numeroRegistros <= 0) { 
    echo "<div align='center'>"; 
    echo "<h2>No se encontraron resultados</h2>"; 
    echo "</div><hr>"; 
} else {
?>

<table border="1" align="center">
    <tr>
        <th>Número de control</th>
        <th>Contraseña</th>
    </tr>
    <?php
    while($row = $Result->fetch_array()) {	    
    ?>
    <tr>
        <td><?php echo $row["nControl"]; ?></td>
        <td><?php echo $row["password"]; ?></td>
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
