<?php
include('validacion.php');
$error="";
$edad=$_POST['edad'];
$error=validarEdad($edad,$error);
$nombre=$_POST['nombre'];
$error=validarNombre($nombre,$error);
$email=$_POST['email'];
$error=validarEmail($email,$error);
$pass=$_POST['pass'];
$error=validacionContraseña($pass,$error);
$dni=$_POST['dni'];
$error=validarDni($dni,$error);
$num=$_POST['numero'];
$error=validarNumero($num,$error);
echo $error;
?>
