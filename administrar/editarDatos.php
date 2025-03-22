<?php
include("../conexion.php");

if($conexion->connect_error){
    echo "Fallo en la Conexion: ".  $conexion->connect_error;
}else{
    $id=intval($_POST['id']);
    $consulta = "SELECT * FROM asociados WHERE asociados_id = $id";
    $resultados=$conexion->query($consulta);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos</title>
</head>
<body>
    <?php
    if($resultados->num_rows > 0){
        $row = $resultados->fetch_assoc();
        ?>
        <h1>Editar Registro</h1>
        <form method="post" action="actualizarDatos.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['asociados_id']); ?>">
            <label for="idnombre">Nombre:</label>
            <input type="text" name="nombre" id="idnombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required><br>
            <label for="iddireccion">Direccion:</label>
            <input type="text" name="direccion" id="iddireccion" value="<?php echo htmlspecialchars($row['direccion']); ?>" required><br>
            <label for="idtel">Telefono</label>
            <input type="text" name="telefono" id="idtel" value="<?php echo htmlspecialchars($row['telefono']); ?>" required><br>
            <label for="idcorreo">Email:</label>
            <input type="text" name="correo" id="idcorreo" value="<?php echo htmlspecialchars($row['email']); ?>" required><br>
            <button type="submit" >Actualizar</button>
        </form>
        <?php
        }else{
            echo "No se encontro ningun registro con ese ID";
        }
        ?>
</body>
</html>