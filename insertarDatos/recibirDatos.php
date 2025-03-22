<?php
include('validacion.php');
$error="";
if(isset($_REQUEST['registrarSocio'])){
    $nombre=$_POST['nombre'];
    $error=validarNombre($nombre,$error);
    $direccion=$_POST['direccion'];
    $error=validarDirreccion($direccion,$error);
    $email=$_POST['correo'];
    $error=validarEmail($email,$error);
    $tel=$_POST['telefono'];
    $error=validarTelefono($tel,$error);
}
if(empty($error)){
    echo "Su solicitud fue exitosa.";
?>
        <form method="post" action="insertarDatos.php">
            <input type="hidden" name="nombre" id="idnombre" value="<?php echo $nombre; ?>" required><br>
            <input type="hidden" name="direccion" id="iddireccion" value="<?php echo $direccion; ?>" required><br>
            <input type="hidden" name="telefono" id="idtel" value="<?php echo $email;?>" required><br>
            <input type="hidden" name="correo" id="idcorreo" value="<?php echo $tel; ?>" required><br>
            <button type="submit" >confirmar</button>
        </form>
<?php
}else{
   echo $error."<br>por favor vuelv a ingresar los datos.";
}
?>
