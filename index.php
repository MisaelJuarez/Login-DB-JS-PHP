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
    <link rel="stylesheet" href="<?=CSS."inicio.css";?>">
    <link rel="stylesheet" href="<?=ICONS."bootstrap-icons.css";?>">
    <title>Formulario de datos</title>
</head>
<body class="vh-100">
    
    <div class="row m-4 c-datos">
        <div class="d-flex justify-content-around align-items-center w-100">
            <h1 class="text-center text-white m-0">Bienvenido <i class="bi bi-emoji-sunglasses-fill py-2 fs-1"></i></h1>
            
            <p class="text-center text-white fs-2 m-0">
                <?= $_SESSION['usuario']['nombre'] . " " . $_SESSION['usuario']['apellido']; ?>
            </p>

            <p class="text-center text-white fs-2 m-0">
                <?= $_SESSION['usuario']['email'] ?>
            </p>

            <div>
                <button class="btn btn-danger" id="btn-cerrrar">
                    <i class="bi bi-box-arrow-left me-2"></i>
                    Cerrar sesión
                </button>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-5 p-5 d-flex justify-content-center">
            <form action="./index.php" method="post" class="p-4">
                <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
                    <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del producto" name="nombre_p" value="">
                </div>
                <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
                    <input type="text" class="form-control" id="precio" placeholder="Ingrese el precio del producto" name="precio_p" value="">
                </div>
                <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
                    <input type="text" class="form-control" id="cantidad" placeholder="Ingrese la cantidad del producto" name="cantidad_p" value="">
                </div>
                <div class="mt-3 c-button d-flex justify-content-center">
                    <button type="button" id="btn-registrar-producto" class="btn text-white fs-4 registrar_producto">Registrar producto</button> 
                </div>
            </form>
        </div>
        <div class="col-7 p-5">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tabla_productos">
                </tbody>
            </table>
        </div>
    </div>



    <script src="./public/js/alerts.js"></script>
    <script src="./public/js/registro_productos.js"></script>
    <script src="./public/js/cerrar_session.js"></script>
</body>
</html>