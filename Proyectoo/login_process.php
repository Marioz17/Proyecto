<?php
session_start();
session_unset();
header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            margin: 0 auto;
            text-align: center;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-container button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-container button:hover {
            background-color: #0056b3;
        }
    </style>
    
<body>
    <div class="container">
        <h2>Inicio de sesion</h2>
        <?php
        try {
            $mysql = new PDO("mysql:host=localhost; dbname=proyectoo", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
        } catch (Exception $e) {
            die("Error de conexión: " . $e->getMessage());
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nControl = $_POST['nControl'];
            $password = $_POST['password'];

            $query = "SELECT * FROM usuarios WHERE nControl = :nControl";
            $stmt = $mysql->prepare($query);
            $stmt->bindParam(':nControl', $nControl, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt === false) {
                die("Error al ejecutar la consulta: " . $mysql->error);
            }

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($nControl === "10101010" && $password === "123450") {
                    header("Location: administrador.php");
                    exit;
                } elseif ($password == $row["password"]) {
                    $_SESSION['nControl'] = $nControl;
                    header("Location: login.php");
                    exit;
                } else {
                    echo "<p class='error'>Contraseña incorrecta.</p>";
                    echo "<p class='error'>¿Quiere registrarse?.</p>";
                    session_destroy();
                    echo "<button><a href='index.php' style='text-decoration: none; color: red;'>Regresar al inicio</a></button>";
                    echo "<button><a href='agregar_usuario.php' style='text-decoration: none; color: red;'>Agregar Nuevo Usuario</a></button>";
                }
            } else {
                echo "<p class='error'>Usuario no encontrado.</p>";
                session_destroy();
                echo "<div class='btn-container'>";
                echo "<button><a href='index.php' style='text-decoration: none; color: white;'>Regresar al inicio</a></button>";
                echo "<br><br>";
                echo "<button><a href='agregar_usuario.php' style='text-decoration: none; color: white;'>Agregar Nuevo Usuario</a></button>";
                echo "</div>";
            }
        }
        ?>

    </div>
</body>
</html>

<?php
$mysql = null;
?>






