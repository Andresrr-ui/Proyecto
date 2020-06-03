<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: index.php');
        }
    }
?>
<?php 
include_once '../conexion.php';
  if(isset($_GET['usuario'])){
    $usuario=(String) $_GET['usuario'];
    $delete=$con->prepare('DELETE FROM admin WHERE usuario=:usuario');
    $delete->execute(array(
      ':usuario'=>$usuario
    ));
    header('Location: lista.php');
  }else{
    header('Location: lista.php');
  }
 ?>