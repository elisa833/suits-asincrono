<?php 
    session_start();
    if (isset($_SESSION['usuario'])) {
        header("location:inicio");
    }
?>

<link rel="stylesheet" href="<?=CSS."main.css";?>">
<body class="d-flex justify-content-center align-items-center mt-5 p-3">
    <form action="./login.php" method="post" class="w-25 p-4">
        <div class="text-center mb-5 c-user">
            <i class="bi bi-person-circle text-dark"></i>
        </div>
        <div class="input-group mt-3">
            <i class="bi bi-person-fill input-group-text fs-3"></i>
            <input type="email" id="email-id" class="form-control" placeholder="Ingrese su email" name="email" value="">
        </div>
        <div class="input-group mt-3">
            <i class="bi bi-lock-fill input-group-text fs-3"></i>
            <input type="password" id="pass-id" class="form-control" placeholder="Ingrese su contraseña" name="pass" value="">
        </div>
        <div class="mt-5 c-button">
             <button type="button" id="btn-saludar" class="btn w-100 text-dark fs-4">Ingresar</button>
        </div>
        <div class="mt-4 d-flex justify-content-center">
            <p class="">¿No tienes una cuenta?</p> 
            <a href="./registro_vista.php" class="text-dark mx-3">Crear ahora</a>
        </div>
    </form>

    <script src="./public/js/alerts.js"></script>
    <script src="./public/js/main.js"></script>
</body>