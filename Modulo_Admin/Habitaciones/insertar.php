<?php
require 'conexion.php';

$codigo = $_POST["codigo"];
$numero_cama = $_POST["numero_cama"];

if(!empty($codigo) && !empty($numero_cama)){
$insertar = "INSERT INTO habitacion values ('$codigo','$numero_cama')";
	header('location: lista.php');
$query = mysqli_query($conectar,$insertar);
} else {

	echo'<script type="text/javascript">
    alert("Campos vacios");
    window.location.href="nuevo.php";
    </script>';
}
?>