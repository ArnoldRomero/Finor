<?php
	session_start();

	$usuario=$_POST['user'];
	$password=$_POST['password'];

	include_once('conexion.php');

	$proceso = $conexion->query("SELECT * FROM usuario WHERE usuario='$usuario' AND password='$password'");

	if ($resultado=mysqli_fetch_array($proceso)) {

		$_SESSION['s_usuario']=$usuario;
		header("location: panel.php");
	}
	else
		header("location: login.php");

?>