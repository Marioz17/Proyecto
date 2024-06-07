<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" type="text/css" href="capstyle.php">
</head>

<body>

<?php
require ("buscar.php");
?>

   <form action="modificacion.php" target="" method="POST">
            <input style="display:none;" type=text size=40 name="NombreBuscar" value="<?php echo $nombreBuscar;?>">
            <TABLE BORDER="1" ALIGN="CENTER" id="table">
                <TR>
                    <TD><strong>Nombre</strong> </TD>
					<TD><input  type=text size=40 name="NombreNuevo" value="<?php echo $nombreBuscar;?>"> </TD>
                </TR>
               
                <TR>
                    <TD><strong>Dirección</strong> </TD>
                    <td><input type=text size=40 name="Direccion" value="<?php echo $direccion;?>"></td>
                </TR>
                <TR>
                    <TD><strong>Teléfono</strong> </TD>
                    <td><input type=text size=40 name="Telefono" value="<?php echo $telefono;?>"></td>
                </TR>
                <TR>
                    <TD><strong>Email</strong> </TD>
                    <td><input type=text size=40 name="Email" value="<?php echo $email;?>"></td>
                </TR>
                
                
            </TABLE>
            <BR>
                <BR>
            <center> <input type=submit class="boton" value="Modificar datos" ></center>
            
            
        </form>
<BR><BR>
       <center> <a href="Actualizar.php" class="boton">Regresar</a>
        <a href="administrador.php" class="boton">Salir</a></center>


</body>
</html>
