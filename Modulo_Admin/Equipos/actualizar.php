<?php 
require 'conexion.php';

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $cantidad=$_POST['cantidad'];

  if(!empty($nombre) && !empty($cantidad)){

$actualizar = "UPDATE equipos_medicos SET id='$id',nombre='$nombre',cantidad='$cantidad' where id='$id'";
$query = mysqli_query($conectar,$actualizar);
        header('Location: lista.php');
    }else{
          echo'<script type="text/javascript">
         alert("Campos vacios");
          window.location.href="update.php";
          </script>'; 
    }
  

?>