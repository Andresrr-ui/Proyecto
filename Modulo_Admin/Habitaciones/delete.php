<?php 
include_once '../conexion.php';
  if(isset($_GET['codigo'])){
    $codigo=(int) $_GET['codigo'];
    $delete=$con->prepare('DELETE FROM Personas WHERE codigo=:codigo');
    $delete->execute(array(
      ':codigo'=>$codigo
    ));
    header('Location: lista.php');
  }else{
    header('Location: lista.php');
  }
 ?>