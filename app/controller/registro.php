<?php
require_once "../config/conexion.php";
session_start();

$expresion = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

if (isset($_SESSION['usuario'])) {
    header("location: ./index.php");
}

if ($_POST) {
    if (isset($_POST['nombre']) && !empty($_POST['nombre']) && 
        isset($_POST['apellido']) && !empty($_POST['apellido']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['pass']) && !empty($_POST['pass'])) {

        if(is_numeric($_POST['nombre'])) {
            echo json_encode([0,"No puedes agregar numeros en el input nombre"]);
        } else if(is_numeric($_POST['apellido'])) {
            echo json_encode([0,"No puedes agregar numeros en el input apellido"]);
        } else if (!preg_match($expresion,$_POST['email'])) {
            echo json_encode([0,"No cumples con las especificaciones de un correo"]);
        } else {

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $passw = $_POST['pass'];

            $insercion = $conexion->prepare("INSERT INTO t_usuarios (nombre,apellido,email,pass) 
                                         VALUES(:nombre,:apellido,:email,:pass)");
            
            $insercion->bindParam(':nombre',$nombre);
            $insercion->bindParam(':apellido',$apellido);
            $insercion->bindParam(':email',$email);
            $insercion->bindParam(':pass',$passw);

            $insercion->execute();

            if ($insercion) {
                echo json_encode([1,"Usuario registrado correctamente"]);
            } else {
                echo json_encode([0,"Usuario NO registrado"]);
            }
        }
        
    } else {
        echo json_encode([0,"No puedes dejar campos vacios"]);
    }
}



?>