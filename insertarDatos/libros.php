<?php
include("../conexion.php");

if ($conexion->connect_error) {
    die("Fallo en la conexión: " . $conexion->connect_error);
}

$consultaAutor="SELECT autor_id, nombre FROM autores;";
$resultadoAutor=$conexion->query($consultaAutor);
$consultaGenero="SELECT categoria_id, genero FROM categorias;";
$resultadoGenero=$conexion->query($consultaGenero);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Libros</title>
</head>
<body>
    <main>
        <form action="insertarDatos.php" method="post">
            <label for="Titulo">Titulo:</label>
            <input type="text" name="titulo" id="idtitulo">
            
            <label for="idgenero">Genero:</label>
            <select name="genero" id="idgenero">
            <?php
                if ($resultadoGenero->num_rows > 0){
                    while ($row1 = $resultadoGenero->fetch_assoc()){
                        echo "<option value=" . $row1['categoria_id'] . ">" . htmlspecialchars($row1['genero']) . "</option>";
                    }
                }
                ?>
            </select> 
            <label for="idautor">Autor:</label>
            <select name="autor" id="idautor">
                <?php
                if ($resultadoAutor->num_rows > 0){
                    while ($row2 = $resultadoAutor->fetch_assoc()){
                        echo "<option value=" . $row2['autor_id'] . ">" . htmlspecialchars($row2['nombre']) . "</option>";
                    }
                }
                ?>
            </select>
            <a href="autores.html">Agregar autor</a>
            <label for="idFp">Fecha de publicación:</label>
            <input type="date" name="fechaPublicacion" id="idFp">
    
            <input type="submit" name="enviar" value="Registrar Libro">
        </form>
    </main>
</body>
</html>
