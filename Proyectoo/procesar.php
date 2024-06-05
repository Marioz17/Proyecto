<?php
session_start(); // Iniciar la sesión si no está iniciada ya

try {
    // Crear una nueva conexión PDO
    $pdo = new PDO("mysql:host=localhost;dbname=proyectoo", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener el número de control del usuario que ha iniciado sesión
    $nControl = $_SESSION['nControl'];

    // Obtener datos del formulario de registro y sanitizar
    $nombre = htmlspecialchars($_POST['nombre']);
    $direccion = htmlspecialchars($_POST['direccion']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $email = htmlspecialchars($_POST['email']);
    $empresa = htmlspecialchars($_POST['empresa']);
    $logros = htmlspecialchars($_POST['logros']);
    $estudios = htmlspecialchars($_POST['estudios']);
    $titulo = htmlspecialchars($_POST['titulo']);
    $habilidad1 = htmlspecialchars($_POST['habilidad1']);
    $habilidad2 = htmlspecialchars($_POST['habilidad2']);
    $habilidad3 = htmlspecialchars($_POST['habilidad3']);
    $certificacion = htmlspecialchars($_POST['certificacion']);
    $institucion = htmlspecialchars($_POST['institucion']);
    $proyecto = htmlspecialchars($_POST['proyecto']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $idioma = htmlspecialchars($_POST['idioma']);
    $idioma1 = htmlspecialchars($_POST['idioma1']);
    
    // Manejo de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        // Crear el directorio de subida si no existe
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        // Generar un nombre único para la imagen
        $nombreImagen = uniqid() . '-' . basename($_FILES['imagen']['name']);
        $rutaImagen = 'uploads/' . $nombreImagen;

        // Mover la imagen subida al directorio 'uploads'
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen)) {
            // Insertar usuario en la base de datos con la ruta de la imagen y el número de control del usuario
            $stmt = $pdo->prepare("INSERT INTO formulario (nControl, nombre, direccion, telefono, email, empresa, logros, estudios,
             titulo, habilidad1, habilidad2, habilidad3, certificacion, institucion, proyecto, descripcion, idioma, idioma1,
             imagen) VALUES (:nControl, :nombre, :direccion, :telefono, :email, :empresa, :logros, :estudios,
             :titulo, :habilidad1, :habilidad2, :habilidad3, :certificacion, :institucion, :proyecto, :descripcion, :idioma, :idioma1,
             :imagen)");
            $stmt->bindParam(':nControl', $nControl);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':empresa', $empresa);
            $stmt->bindParam(':logros', $logros);
            $stmt->bindParam(':estudios', $estudios);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':habilidad1', $habilidad1);
            $stmt->bindParam(':habilidad2', $habilidad2);
            $stmt->bindParam(':habilidad3', $habilidad3);
            $stmt->bindParam(':certificacion', $certificacion);
            $stmt->bindParam(':institucion', $institucion);
            $stmt->bindParam(':proyecto', $proyecto);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':idioma', $idioma);
            $stmt->bindParam(':idioma1', $idioma1);
            $stmt->bindParam(':imagen', $rutaImagen);

            if ($stmt->execute()) {
                echo "<center>Datos registrados correctamente.</center>";
            } else {
                echo "Error al registrar datos: " . $stmt->errorInfo()[2];
            }
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "No se ha subido ninguna imagen o hubo un error en la subida.";
    }
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
<link rel="stylesheet" type="text/css" href="style.css">
<br>
<button type="button" onclick="location.href='muestra.php'">Mostrar</button>
