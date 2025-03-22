<?php
include("../conexion.php");
include("validacion.php");
if(isset($_REQUEST['registrarSocio'])){

        $error="";
        $fechaRegistro = date("Y-m-d");
        $nombre=$_POST['nombre'];
        $error=validarNombre($nombre,$error);
        $direccion=$_POST['direccion'];
        $error=validarDirreccion($direccion,$error);
        $email=$_POST['correo'];
        $error=validarEmail($email,$error);
        $tel=$_POST['telefono'];
        $error=validarTelefono($tel,$error);
        echo $error;
        if(empty($error)){
            $sql="INSERT INTO asociados (
                nombre, direccion, telefono, email, fecha_registro) VALUES(?, ?, ?, ?,?);";
                $sentencia=$conexion->prepare($sql); 
                $sentencia->bind_param("ssiss", $nombre, $direccion, $tel, $email , $fechaRegistro);
                if($sentencia->execute()){
                    echo "Los datos se guardaron Exitosamente.";
                }else{
                    echo "Error al guardar los datos: ";
                }
            }
            $conexion->close();

if(isset($_REQUEST['registrarLibro'])){
    
        $titulo=$_REQUEST['titulo'];
        $idgenero=$_REQUEST['genero'];
        $idautor=$_REQUEST['autor'];
        $fechaPublicacion=$_REQUEST['fechaPublicacion'];

        $sql="INSERT INTO libros (
        titulo ,categoria_id, autor_id, anio_publicacion) VALUES(?, ?, ?, ?);";
        $sentencia=$conexion->prepare($sql); 
        $sentencia->bind_param("siis", $titulo,$idgenero,$idautor,$fechaPublicacion);
        if($sentencia->execute()){
            echo "Los datos se guardaron Exitosamente.";
        }else{
            echo "Error al guardar los datos: ". $sentencia->error;
        }
        $sentencia->close(); 
    }
    $conexion->close();
}
if(isset($_POST['fechaPrestamo'])){
    if($conexion->connect_error){
        die("Conexion Fallida: ");
    }else{
        $idLibro=$_REQUEST['selecLibro'];
        $idAsociado=$_REQUEST['ida'];
        $fechaDias=(int)$_REQUEST['fechaPrestamo']*7;
        $fechaActual=date("Y-m-d");
        $fecha = new DateTime();
        $fecha->modify("+$fechaDias days");
        $fechaDevolucion=$fecha->format("Y-m-d");

        $sql="INSERT INTO prestamos (
        asociado_id ,libro_id, fecha_prestamo, fecha_devolucion) VALUES(?, ?, ?, ?);";
        $sentencia=$conexion->prepare($sql); 
        $sentencia->bind_param("iiss", $idAsociado, $idLibro,$fechaActual,$fechaDevolucion);
        if($sentencia->execute()){
            echo "Los datos se guardaron Exitosamente.";
        }else{
            echo "Error al guardar los datos: ". $sentencia->error;
        }
        $sentencia->close(); 
    }
    $conexion->close();
}
if(isset($_REQUEST['registrarAutor'])){


        $nombre=$_REQUEST['nombre'];
        $apellido=$_REQUEST['apellido'];
        $nacionalidad=$_REQUEST['nacionalidad'];
        $fechaNacimiento=$_REQUEST['fechaNacimiento'];

        $consulta="INSERT INTO autores (
        nombre, apellido, nacionalidad, fecha_nacimiento) VALUES (?,?,?,?);";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->bind_param("ssss", $nombre, $apellido, $nacionalidad, $fechaNacimiento);
        if($sentencia->execute()){
            echo "Los datos se guardaron exitosamente.";
        }else{
            echo "Error al guardar los datos: ";
        }
    }
?>