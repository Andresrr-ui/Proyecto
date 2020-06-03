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
  if(isset($_GET['CEDULA'])){
    $CEDULA=(int) $_GET['CEDULA'];
    $delete=$con->prepare('DELETE FROM Personas WHERE CEDULA=:CEDULA');
    $delete->execute(array(
      ':CEDULA'=>$CEDULA
    ));
    header('Location: lista.php');
  }else{
    header('Location: lista.php');
  }
 ?>