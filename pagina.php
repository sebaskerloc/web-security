<?php

session_start();

if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
	echo "<h1>Bienvenido: $usuarioingresado </h1>";
}
else
{
	header('location: index.php');
}

if(isset($_POST['btncerrar']))
{
	session_destroy();
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="login.css">
	<script src="./../../js/jquery-3.4.1.min.js"></script>
    <script src="./../../js/jquery-1.8.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="./../../js/plugins/validetta/validetta.min.css" rel="stylesheet">
    <link href="./../../js/plugins/confirm/jquery-confirm.min.css" rel="stylesheet">
    <link href="./../../css/general.css" rel="stylesheet">
    <link href="./../../js/plugins/validetta/validetta.css" rel="stylesheet" type="text/css" media="screen" >
    <script src="./../../js/plugins/confirm/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="./../../js/plugins/validetta/validetta.js"></script>
<body>
	<div id="contrasena" class="col s18">
            <h1 class="h3 mb-2 text-gray-800">&nbsp;</h1>
            <h1 class="h3 mb-2 text-gray-800">Cambiar contraseña</h1>
            <div class="row">
                <form id="formCambiarContrasena">
                    <div class="col s12 m4 input-field">
                        <label for="contrasenaAct">Contrase&ntilde;a actual</label>
                        <input type="password" id="contrasenaAct" name="contrasenaAct" >
                    </div>
                    <div class="col s12 m4 input-field">
                        <label for="contrasenaNva">Contrase&ntilde;a nueva</label>
                        <input type="password" id="contrasenaNva" name="contrasenaNva" data-validetta="required,equalTo[contrasenaNva2]">
                    </div>
                    <div class="col s12 m4 input-field">
                        <label for="contrasenaNva2">Confirmar contrase&ntilde;a</label>
                        <input type="password" id="contrasenaNva2" name="contrasenaNva2" data-validetta="required,equalTo[contrasenaNva]">
                    </div>
                    <div class="col s12 input-field">
                        <input type="submit" class="btn deep-orange accent-2" style="width:100%" value="Cambiar contrase&ntilde;a">
                    </div>
                </form>
            </div>
        </div>
<form method="POST">
	<input type="submit" value="Cerrar sesión" name="btncerrar" />
</form>
</body>
</html>