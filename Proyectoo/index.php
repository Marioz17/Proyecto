<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">

    <title>Iniciar Sesi&oacute;n</title>
</head>
<body>
    <h1>Iniciar Sesi&oacute;n</h1>
    <nav>
        <ul>
        <form action="login_process.php" method="POST">
        <label for="nControl">Numero de control:</label>
        <input type="text" id="nControl" name="nControl" required><br><br>
        
        <label for="password">Contrase&nacute;a:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Iniciar Sesi&oacute;n</button>
        <button id ="login"><a href='agregar_usuario.php' style='text-decoration: center; color: blue;'>Agregar Nuevo Usuario</a></button>
        </form>
        </ul>
    </nav>
</body>
</html>
