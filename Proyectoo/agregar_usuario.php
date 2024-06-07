
<!DOCTYPE html>

    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Agregar Nuevo Usuario</title>
</head>
<body>
    <h2>Agregar Nuevo Usuario</h2>
    <form action="procesarNuevoUsuario.php" method="POST">
        <label for="nControl">Numero de control:</label>
        <input type="text" id="nControl" name="nControl" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Agregar Usuario">
        <button><a href="index.php">Regresar al inicio</a></button>
    </form>
</body>
</html>