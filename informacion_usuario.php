<?php
require_once("./app/config/dependencias.php");
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS."bootstrap.min.css";?>">
    <link rel="stylesheet" href="<?=CSS."informacion_usuario.css";?>">
    <link rel="stylesheet" href="<?=ICONS."bootstrap-icons.css";?>">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="row m-4 c-datos">
        <div class="d-flex justify-content-center align-items-center w-100">
            <h1 class="text-white m-0">
                Tu informacion personal
                <i class="bi bi-clipboard-data-fill"></i>
            </h1>
        </div>
    </div>

        <div class="row">
            <div class="col">
                <div class="m-5 p-3 contenedor_usuario">
                    <div class="text-center">
                        <i class="bi bi-person-circle text-white"></i>
                    </div>
                    <div class="text-center">
                        <p class="text-white nombre_usuario">
                            <?=$_SESSION['usuario']['nombre'];?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <form action="" class="m-5 p-4">
                    <div class="form-floating w-100 mb-3">
                        <input class="form-control" type="text" aria-label="default input example" name="nombre" id="nombre">
                        <label for="nombre">Ingrese su nombre</label>
                    </div>                        

                    <div class="form-floating w-100 mb-3">
                        <input class="form-control" type="text" aria-label="default input example" name="apellido" id="apellido">
                        <label for="nombre">Ingrese su apellido</label>
                    </div> 

                    <div class="form-floating w-100 mb-3">
                        <input class="form-control" type="email" aria-label="default input example" name="email" id="email">
                        <label for="nombre">Ingrese su email</label>
                    </div> 

                    <div class="form-floating w-100 mb-4">
                        <input class="form-control" type="password" aria-label="default input example" name="pass" id="pass">
                        <label for="nombre">Ingrese su contraseña</label>
                    </div> 

                    <div class="d-flex justify-content-evenly">
                        <button type="button" id="btn-actualizar" class="btn fs-4">Guardar</button>
                        <a href="./index.php" type="button" class="btn btn-outline-primary fs-4 text-white">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="./public/js/alerts.js"></script>
    <script src="./public/js/informacion_usuario.js"></script>
</body>
</html>