<?php
include("../conexion.php");

if($conexion->connect_error){
    echo "Fallo en la Conexion: ".  $conexion->connect_error;
}else{
    $id = $_POST['id'];
    $nombre= $conexion->real_escape_string($_POST['nombre']);
    $direccion= $conexion->real_escape_string($_POST['direccion']);
    $telefono= $conexion->real_escape_string($_POST['telefono']);
    $email= $conexion->real_escape_string($_POST['correo']);

    $sql = "UPDATE asociados SET nombre = '$nombre', direccion = '$direccion',
    telefono = '$telefono', email = '$email' WHERE asociados_id = $id";
    if ($conexion->query($sql) === TRUE) {
    echo "Registro actualizado exitosamente."."<br>";
    echo '<a href="../administrar">Regresar</a>';
    } else {
    echo "Error al actualizar el registro: " . $conexion->error;
}

$conexion->close();
}
?>