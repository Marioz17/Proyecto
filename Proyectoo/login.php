<!-- login.php -->

<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['nControl'])) {
    header("Location: index.php"); // Redirigir a la página de inicio de sesión
    exit;
}

// Resto del código aquí
echo "<center>Bienvenido, </center>" . $_SESSION['nControl'];

?>

<head>
<link rel="stylesheet" href="css/styles.css">

</head>
<body>
    <nav>
<br> <button><a href="formulario.php">Ir al formulario</a></button>
<button><a href="muestra.php">Mostrar Cv</a></button>
    </nav>
</body>

