<?php
function validarNombre($nombre,$error){
    if(empty($nombre)){
        $error=$error."<br>Campo Nombre vacio.";
    }elseif(strlen($nombre)>15){
        $error=$error."<br>El nombre es Muy Largo.";    
    }elseif(is_numeric($nombre)){
        $error=$error."<br>EL nombre es Numerico.";
    }
    return $error;
}
function validarEdad($edad,$error){
    if(empty($edad)){
      $error=$error."<br>Campo Edad vacio.";
    }
    return $error;
    }
function validarEmail($email,$error){
    if(empty($email)){
        $error=$error."<br>Campo email Vacio.";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error=$error."<br>Lo ingresado no es Email.";
    }
    return $error;
}
function validacionContraseña($pass,$error){
    if(empty($pass)){
        $error=$error."<br>Campo Contraseña vacio.";
    }elseif(!preg_match("/[a-z]/",$pass)){
        $error=$error."<br>La contraseña tiene que tener Minuscula.";
    }elseif(!preg_match("/[A-Z]/",$pass)){
        $error=$error."<br>La contraseña tiene que tener Mayuscula.";
    }elseif(!preg_match("/[0-9]/",$pass)){
        $error=$error."<br>La contraseña tiene que tener Numeros.";
    }elseif(!preg_match("/[!@#$%&*?.+_:;=-]/",$pass)){
        $error=$error."<br>La contraseña tien que tener alguno de estos dijitos [!@#$%&*?.+_:;=-].";
    }
    return $error;
    }
function validarDni($dni,$error){
    if(empty($dni)){
        $error=$error."<br>Campo DNI Vacio.";
    }elseif(strlen($dni)<8){
        $error=$error."<br>El DNI tiene que tener 8 Digitos.";
    }
    return $error;
}
function validarNumero($numero,$error){
    if(empty($numero)){
        $error=$error."<br>Campo Numero Vacio.";
    }elseif(!is_numeric($numero)){
        $error=$error."<br>Rellene su numero telefonico con Numeros.";
    }elseif(strlen($numero)<10){
        $error=$error."<br>Ingrese un numero mayor a las 10 cifras.";
    }
    return $error;
}
function validarContraseñas($pass,$pass2,$error){
    if($pass!=$pass2){
        $error=$error."<br>La contraseña no coincide.";
    }
}
?>


