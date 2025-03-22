<?php
include("../conexion.php");

if($conexion->connect_error){
    echo "Fallo en la Conexion: ".  $conexion->connect_error;
}else{
    $id=intval($_POST['id']);
    $consulta="DELETE FROM asociados WHERE asociados_id = $id";
    $conexion->query($consulta);
    $conexion->close();
}
?>