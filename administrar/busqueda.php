<?php
include("../conexion.php");
if($conexion->connect_error){
    echo "Fallo en la Conexion: ".  $conexion->connect_error;
}else{
    $criterio=$conexion->real_escape_string($_POST['criterio']) ;
    $consulta="SELECT * FROM asociados WHERE nombre LIKE '%$criterio%'";
    $resultado=$conexion->query($consulta);
    if ($resultado->num_rows > 0){
        echo "<h1>Resultados:</h1>";
        while($row = $resultado->fetch_assoc()) {
            echo "<p>". htmlspecialchars($row['nombre']) .". |".htmlspecialchars($row['asociados_id'])."|</p>";
        }
    }else{
        echo "<p>No se encontraron resultados para '$criterio'.</p>";
    }
    $conexion->close();
}
?>