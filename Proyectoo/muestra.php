<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<link rel="stylesheet" href="css/botones.css">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<?php
echo "<center>Bienvenido, </center>" . $_SESSION['nControl'];
$nControl = $_SESSION['nControl'];
$style = isset($_GET['style']) ? $_GET['style'] : 'style1';
echo '<link rel="stylesheet" type="text/css" href="css/' . htmlspecialchars($style) . '.css">';
?>

<!-- Incluir las bibliotecas jsPDF y html2canvas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
window.onload = function() {
    document.getElementById('downloadPDF').addEventListener('click', function () {
        html2canvas(document.getElementById('container')).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const { jsPDF } = window.jspdf;

            const imgWidth = canvas.width;
            const imgHeight = canvas.height;

            const pdfWidth = 210; // Ancho en mm para A4
            const pdfHeight = 297; // Alto en mm para A4

            const doc = new jsPDF('portrait', 'mm', 'a4');

            const ratio = Math.min(pdfWidth / imgWidth, pdfHeight / imgHeight);
            const width = imgWidth * ratio;
            const height = imgHeight * ratio;

            doc.addImage(imgData, 'PNG', 0, 0, width, height);
            
            doc.save('miCV.pdf');
        });
    });
};
</script>

</head>

<body>
<?php 
$mysql = new mysqli("localhost", "root", "", "proyectoo");

if ($mysql->connect_error) {
    die("Error de conexión: " . $mysql->connect_error);
}

$Query = "SELECT * FROM formulario";
$Result = $mysql->query($Query);

$numeroRegistros = $Result->num_rows;
if ($numeroRegistros <= 0) { 
    echo "<div align='center'>"; 
    echo "<h2>No se encontraron resultados</h2>"; 
    echo "</div><hr>"; 
} else {
    while ($row = $Result->fetch_array()) {
        ?>

        <div id="container" class="container">
            <div class="header">
                <h1><?php echo htmlspecialchars($row["nombre"]); ?></h1>
                <h2><?php echo htmlspecialchars($row["direccion"]); ?></h2>
                <h2><?php echo htmlspecialchars($row["telefono"]); ?></h2>
                <h2><?php echo htmlspecialchars($row["email"]); ?></h2>
                <!-- Mostrar la imagen -->
                <?php if (!empty($row["imagen"])) { ?>
                    <img src="<?php echo htmlspecialchars($row["imagen"]); ?>" alt="Imagen de <?php echo htmlspecialchars($row["nombre"]); ?>" style="width:150px;height:auto;">
                <?php } ?>
            </div>

            <div class="section">
                <h2>Experiencia Laboral</h2>
                <ul>
                    <li>
                        <span><?php echo htmlspecialchars($row["empresa"]); ?></span>
                        <br>
                        <h6><?php echo htmlspecialchars($row["logros"]); ?></h6>
                    </li>
                </ul>
            </div>

            <div class="section">
                <h2>Educación</h2>
                <ul>
                    <li>
                        <span><?php echo htmlspecialchars($row["estudios"]); ?></span>
                        <br>
                        <h8><?php echo htmlspecialchars($row["titulo"]); ?></h8>
                    </li>
                </ul>
            </div>

            <div class="section">
                <h2>Habilidades</h2>
                <ul>
                    <li><?php echo htmlspecialchars($row["habilidad1"]); ?></li>
                    <li><?php echo htmlspecialchars($row["habilidad2"]); ?></li>
                    <li><?php echo htmlspecialchars($row["habilidad3"]); ?></li>
                </ul>
            </div>

            <div class="section">
                <h2>Certificaciones</h2>
                <ul>
                    <li><?php echo htmlspecialchars($row["certificacion"]); ?></li>
                    <li><?php echo htmlspecialchars($row["institucion"]); ?></li>
                </ul>
            </div>

            <div class="section">
                <h2>Proyectos</h2>
                <ul>
                    <li>
                        <span><?php echo htmlspecialchars($row["proyecto"]); ?></span>
                    </li>
                    <span><?php echo htmlspecialchars($row["descripcion"]); ?></span>
                </ul>
            </div>

            <div class="section">
                <h2>Idiomas</h2>
                <ul>
                    <li><?php echo htmlspecialchars($row["idioma"]); ?></li>
                    <li><?php echo htmlspecialchars($row["idioma1"]); ?></li>
                </ul>
            </div>
        </div>

        <?php
    }
}
?>

<br>

<p>
<center>
    <a href="formulario.php" class="boton">Volver</a>
    <br><br>

    <div class="botones-container">
        <button><a href="?style=forma1" class="boton"><img src="uno.jpg" width="100px" alt="60px"></a></button>
        <button><a href="?style=form2" class="boton"><img src="dos.jpg" width="100px" alt="60px"></a></button>
        <button><a href="?style=form3" class="boton"><img src="tres.jpg" width="100px" alt="60px"></a></button>
        <button><a href="?style=forma4" class="boton"><img src="cuatro.jpg" width="100px" alt="60px"></a></button>
        <button><a href="?style=forma5" class="boton"><img src="cinco.jpg" width="100px" alt="60px"></a></button>
    </div>

    <br><br>
    <button><a href="logout.php" class="boton">Cerrar Sesión</a></button>
    <br><br>
    <center><button id="downloadPDF">Descargar como PDF</button></center><button><a href="email-api.php" class="boton">Enviar a Correo</a></button>
</center>
</p>

</body>
</html>


