<?php
include("../conexion.php");

if($conexion->connect_error){
    echo "Fallo en la Conexion: ".  $conexion->connect_error;
}else{
    $consulta="SELECT libro_id, titulo FROM libros;";
    $resultado=$conexion->query($consulta);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamo</title>
</head>
<body>
    <form action="insertarDatos.php" method="post">
        <label for="selecLibroid">Seleccione un libro:</label>
        <select name="selecLibro" id="selecLibroid">
            <?php
            if($resultado->num_rows >0){
                while($row = $resultado->fetch_assoc()){
                    echo "<option value= ". $row['libro_id'] . ">" . htmlspecialchars($row['titulo'])."</option>"; 
                }
            }
            ?>
        </select>
        <label for="idid">ID asociado:</label>
        <input type="number" name="ida" id="idid">
        <label for="fpid">Por cuanto desea conservarlo:</label><br>
        <select name="fechaPrestamo" id="fpid">
            <option value="1">7 Dias</option><br>
            <option value="2">14 Dias</option><br>
            <option value="3">21 Dias</option><br>
        </select>
        <input type="submit" name="registrarPrestamo" value="Registrar Préstamo">
    </form>
    <script src="scipts.js"></script>
</body>
</html>