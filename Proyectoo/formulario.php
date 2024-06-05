<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Currículum Vitae</title>
  <link rel="stylesheet" href="css/formulario.css">
</head>
<body>
  <div class="container">
    <h1>Formulario de Currículum Vitae</h1>
    <form action="procesar.php" method="post" enctype="multipart/form-data">
      <label for="nombre">Nombre completo:</label><br>
      <input type="text" id="nombre" name="nombre" required><br><br>

      <label for="direccion">Direccion:</label><br>
      <input type="text" id="direccion" name="direccion" required><br><br>

      <label for="telefono">Telefono:</label><br>
      <input type="number" id="telefono" name="telefono" required><br><br>
     
      <label for="email">Email:</label><br>
      <input type="text" id="email" name="email" required><br><br>

      <p>Experiencia laboral</p>

      <label for="empresa">Nombre de la empresa:</label><br>
      <input type="text" id="empresa" name="empresa" required><br><br>
     
      <label for="logros">Descripcion de las responsabilidades y logros:</label><br>
      <input type="text" id="logros" name="logros" required><br><br>
     
      <p>Educacion</p>

      <label for="estudios">Nombre de la institucion</label><br>
      <input type="text" id="estudios" name="estudios" required><br><br>
     
      <label for="titulo">Titulo obtenido</label><br>
      <input type="text" id="titulo" name="titulo" required><br><br>
     
      <p>Habilidades</p>

      <label for="habilidad1">Habilidad 1</label><br>
      <input type="text" id="habilidad1" name="habilidad1" required><br><br>
     
      <label for="habilidad2">Habilidad 2</label><br>
      <input type="text" id="habilidad2" name="habilidad2" required><br><br>
      
      <label for="habilidad3"> Habilidad 3</label><br>
      <input type="text" id="habilidad3" name="habilidad3" required><br><br>

      <p>Certificaciones</p>

      <label for="certificacion">Nombre de la certificacion</label><br>
      <input type="text" id="certificacion" name="certificacion" required><br><br>
     
      <label for="institucion">Nombre de la institucion</label><br>
      <input type="text" id="institucion" name="institucion" required><br><br>
     
      <p>Proyectos</p>

      <label for="proyecto">Nombre del proyecto</label><br>
      <input type="text" id="proyecto" name="proyecto" required><br><br>

      <label for="descripcion">Descripcion del proyecto</label><br>
      <input type="text" id="descripcion" name="descripcion" required><br><br>

      <p>Idiomas</p>

      <label for="idioma">Idioma 1</label><br>
      <input type="text" id="idioma" name="idioma" required><br><br>

      <label for="idioma1">Idioma 2</label><br>
      <input type="text" id="idioma1" name="idioma1" required><br><br>
      
      <label for="imagen">Imagen:</label><br>
      <input type="file" id="imagen" name="imagen" accept="image/*"><br><br>
     
      <input type="submit" value="Enviar">
    </form>
  </div>
</body>
</html>
