<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        header("location:registro");
    }
?>

<link rel="stylesheet" href="<?=CSS."informacion_usuario.css";?>">


    <div class="container">
    <div class="row m-4 c-datos">
        <div class="d-flex justify-content-center align-items-center w-100">
            <h1 class="text-dark m-0">
                Informacion personal
                <i class="bi bi-clipboard-data-fill"></i>
            </h1>
        </div>
    </div>

        <div class="row">
            <div class="col">
                <div class="m-5 p-3 contenedor_usuario">
                    <div class="text-center">
                        <i class="bi bi-person-circle text-dark"></i>
                    </div>
                    <div class="text-center">
                        <p class="text-dark nombre_usuario">
                            <?=$_SESSION['usuario']['nombre'];?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <form action="" class="m-5 p-4">
                    <div class="mb-4 d-flex justify-content-center">
                        <input class="form-control" type="text" aria-label="default input example" name="nombre" id="nombre">
                    </div>

                    <div class="mb-4 d-flex justify-content-center">
                        <input class="form-control" type="text" aria-label="default input example" name="apellido" id="apellido">
                    </div>

                    <div class="mb-4 d-flex justify-content-center">
                        <input class="form-control" type="email" aria-label="default input example" name="email" id="email">
                    </div>

                    <div class="mb-5 d-flex justify-content-center">
                        <input class="form-control" type="password" aria-label="default input example" name="pass" id="pass">
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
    <body class="d-flex justify-content-center align-items-center mt-5 p-3">
    <form action="./registro_vista.php" method="post" class="w-25 p-4">
        <div class="text-center mb-4 c-user">
            <i class="bi bi-person-fill-add text-dark"></i>
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-person-fill fs-3 text-dark mx-1"></i>
            <input type="text" class="form-control" placeholder="Ingrese su nombre" id="nombre" name="nombre" value="">
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-person-fill fs-3 text-dark mx-1"></i>
            <input type="text" class="form-control" placeholder="Ingrese su apellido" id="apellido" name="apellido" value="">
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-envelope-fill fs-3 text-dark mx-1"></i>
            <input type="email" class="form-control" placeholder="Ingrese su email" id="email" name="email" value="">
        </div>
        <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
            <i class="bi bi-key-fill fs-3 text-dark mx-1"></i>
            <input type="password" class="form-control" placeholder="Ingrese su contraseña" id="pass" name="pass" value="">
        </div>
        <div class="mt-3 c-button">
            <button type="button" id="btn-registrar" class="btn w-100 text-dark fs-4">Registrar</button> 
        </div>
    </form>

    <script src="./public/js/alerts.js"></script>
    <script src="./public/js/main.js"></script>
</body>
