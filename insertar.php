<?php
require 'conexion.php';

$usuario = $_POST["usuario"];
$password = $_POST["password"];
$rol = $_POST["rol"];

$pass_cif=password_hash($password, PASSWORD_DEFAULT);

if(!empty($usuario) && !empty($password)){
$insertar = "INSERT INTO admin values ('$usuario','$pass_cif','$rol')";
	header('location: lista.php');
$query = mysqli_query($conectar,$insertar);
} else {

	echo'<script type="text/javascript">
    alert("Campos vacios");
    window.location.href="nuevo.php";
    </script>';
}
?>