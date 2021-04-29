<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="inicio.css">
</head>

<body>
    <div align="right">
        <form method="POST">
            <table>
                <tr><td colspan="2" style="background-color:#33A8DB;padding-bottom:10px;"><label>Cambiar contraseña</label></td></tr>
                <tr><td rowspan="6"><img src="contra.jpg"></td><td><label>Nueva Contraseña</label></td></tr>
                <tr><td><input type="password" name="NvaContra" placeholder="Ingresar nueva clave" required /> </td></tr>  
                <tr><td><label>Confirmar Contraseña</label></td></tr>
                <tr><td><input type="password" name="NvaContra2" placeholder="Confirmar clave" required /> </td></tr>
                <tr><td><input type="submit" name="btnCambiar" value="Cambiar"/></td></tr>
            </table>
        </form>
    </div>
    <div>
        <form method="POST">
            <input type="submit" value="Cerrar sesión" name="btncerrar" />
        </form>
    </div>
</body>

</html>

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

if(isset($_POST['btnCambiar']))
{
	
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="bdtest";
	
	$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(!$conn)
	{
		die("No hay conexión: ".mysqli_connect_error());
	}
	
	$NvaClave=$_POST['NvaContra'];
	$NvaClave2=$_POST['NvaContra2'];
	
	$query=mysqli_query($conn, "UPDATE login SET password = '$NvaClave' WHERE usuario = '$usuarioingresado'" );

	
	
	    if($query) /*$nr == 1*/
	    {
		    echo "<script>alert('Contraseña actualizada');window.location= 'inicio.php' </script>";
	    }
	    else  /*nr == 0*/
	    {
		    echo "<script>alert('No se pudo actualizar la contraseña');window.location= 'inicio.php' </script>";
	    }
	
}
?>