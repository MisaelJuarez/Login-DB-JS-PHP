<?php
require_once("./app/config/dependencias.php");
session_start();

if (isset($_SESSION['usuario'])) {
    header("location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS."bootstrap.min.css";?>">
    <link rel="stylesheet" href="<?=ICONS."bootstrap-icons.css";?>">
    <link rel="stylesheet" href="<?=CSS."registro_vista.css";?>">
    <title>Formulario de datos</title>
</head>
<body class="d-flex justify-content-center align-items-center mt-5 p-3">
    <form action="./registro_vista.php" method="post" class="w-25 p-4">
        <div class="text-center mb-4 c-user">
            <i class="bi bi-person-fill-add text-white"></i>
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-person-fill fs-3 text-white mx-1"></i>
            <input type="text" class="form-control" placeholder="Ingrese su nombre" id="nombre" name="nombre" value="">
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-person-fill fs-3 text-white mx-1"></i>
            <input type="text" class="form-control" placeholder="Ingrese su apellido" id="apellido" name="apellido" value="">
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-envelope-fill fs-3 text-white mx-1"></i>
            <input type="email" class="form-control" placeholder="Ingrese su email" id="email" name="email" value="">
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-key-fill fs-3 text-white mx-1"></i>
            <input type="password" class="form-control" placeholder="Ingrese su contraseña" id="pass" name="pass" value="">
        </div>
        <div class="mt-3 c-button">
            <button type="button" id="btn-registrar" class="btn w-100 text-white fs-4">Registrar</button> 
        </div>
    </form>

    <script src="./public/js/alerts.js"></script>
    <script src="./public/js/main.js"></script>
</body>
</html>