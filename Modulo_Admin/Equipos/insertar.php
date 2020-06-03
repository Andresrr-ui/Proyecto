<?php
require 'conexion.php';

$nombre = $_POST["nombre"];
$cantidad = $_POST["cantidad"];

if(!empty($nombre) && !empty($cantidad)){
$insertar = "INSERT INTO equipos_medicos values ('$nombre','$cantidad')";
	header('location: lista.php');
$query = mysqli_query($conectar,$insertar);
} else {

	echo'<script type="text/javascript">
    alert("Campos vacios");
    window.location.href="nuevo.php";
    </script>';
}
?>