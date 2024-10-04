<?php
require_once '../config/conexion.php';
session_start();

if ($_POST) {
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])) {

        $email = $_POST['email'];
        $passw = $_POST['pass'];

        $consulta = $conexion->prepare("SELECT * FROM t_usuarios WHERE email = :email");
        $consulta->bindParam(':email',$email);
        $consulta->execute();
        $datos = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($datos) {
            if ($datos['pass'] == $passw) {
                $_SESSION['usuario'] = $datos;
                echo json_encode([1,"Datos de acceso correctos"]);
            } else {
                    echo json_encode([0,"Error en credenciales de acceso"]);
                }
        } else {
            echo json_encode([0,"Informacion no localizada"]);
        }
        
    } else {
        echo json_encode([0,"Tienes que llenar los datos en el formulario"]);
    }
}

?>