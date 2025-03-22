<?php
include("../conexion.php");

if($conexion->connect_error){
    echo "Fallo en la Conexion: ".  $conexion->connect_error;
}else{
    $consulta="SELECT * FROM asociados";
    $resultado=$conexion->query($consulta);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar</title>
</head>
<body>
    <header>
        <center>
            <form action="busqueda.php" method="post">
                <label for="idcriterio">buscar Asociado</label>
                <input type="text" name="criterio" id="idcriterio">
                <input type="submit" value="enviar">
            </form>
            <h2>Administar asociados</h2>
            <?php
            echo "<table border='1'>";
            echo "<tr>";

            while($fieldinfo = $resultado->fetch_field()){
                echo "<th>" . htmlspecialchars($fieldinfo->name) . "</th>";
            }
            echo "</tr>";
            while($row = $resultado->fetch_assoc()){
                echo "<tr>";
                foreach($row as $valor){
                    echo "<td>". htmlspecialchars($valor)."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            ?>
                    <div class="nav-admin">
            <nav>
                <a href="borrar.html">Borrar</a>
                <a href="editar.html">Editar</a>
            </nav>
        </div>
        </center>
    </header>
</body>
</html>