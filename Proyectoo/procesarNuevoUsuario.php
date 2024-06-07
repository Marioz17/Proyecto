<?php
session_start();

try {
    $mysql = new PDO("mysql:host=localhost; dbname=proyectoo", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES 'UTF8'"));

    $nControl = $_POST['nControl']; 
    $password = $_POST['password'];

    
    
    // Preparar la consulta
    $query = "INSERT INTO usuarios (nControl, password) VALUES (:nControl, :password)";
    $statement = $mysql->prepare($query);

    // Asignar valores y ejecutar la consulta
    $statement->bindParam(':nControl', $nControl);
    $statement->bindParam(':password', $password);

    if ($statement->execute()) {
        echo "<center>Nuevo usuario agregado correctamente.</center>";
        echo '<br><center><button><a href="index.php">Regresar al inicio</a></button><center>';
    } else {
        $errorInfo = $statement->errorInfo();
        echo "Error al agregar el usuario: " . $errorInfo[2]; // Accede al tercer elemento del array
    }
} catch(Exception $e) {
    die ("Error de conexion: " . $e->getMessage());
}

// Cerrar la conexión
$mysql = null;
?>
