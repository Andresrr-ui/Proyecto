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

    $buscar_id=$con->prepare('SELECT * FROM equipos_medicos WHERE id=:id LIMIT 1');
    $buscar_id->execute(array(
      ':id'=>$id
    ));
    $resultado=$buscar_id->fetch();
  }else{
    header('Location: index.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  body {
    background:url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTKW1ip1s-T9tW2R4-X5mD49OTbr9oNg28uJg2Iy-sc4XgDdMli&usqp=CAU) ;
   background-repeat: no-repeat, repeat;
   background-size: 1600px;
  }
    
</style>

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Sistema medico</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../inicioadmin.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Administradores/lista.php">Administradores<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Habitaciones/lista.php">Habitaciones</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Recursos/lista.php">Recursos</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../Equipos/lista.php">Equipos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Pacientes/lista.php">Lista de Pacientes</a>
      </li>
    </ul>
    <span class="navbar-text">
      <a class="btn btn-primary" href="cerrar.php">Cerrar Sesion</a>
    </span>
  </div>
</nav>
  <div class="contenedor">
    <form action="actualizar.php" method="POST">
      <div class="form-group">
        <label style="color:white;">Nombre</label>
        <input type="hidden" name="id" value="<?php if($resultado) echo $resultado['id'];?>" class="input-text">
        <input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input-text">
        <label style="color:white;">Cantidad</label>
        <input type="text" name="cantidad" value="<?php if($resultado) echo $resultado['cantidad']; ?>" class="input-text">
      </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</body>
