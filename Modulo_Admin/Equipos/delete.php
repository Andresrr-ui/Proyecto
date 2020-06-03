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
  if(isset($_GET['id'])){
    $id=(int) $_GET['id'];
    $delete=$con->prepare('DELETE FROM equipos_medicos WHERE id=:id');
    $delete->execute(array(
      ':id'=>$id
    ));
    header('Location: lista.php');
  }else{
    header('Location: lista.php');
  }
 ?>