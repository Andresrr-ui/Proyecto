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

    $buscar_CEDULA=$con->prepare('SELECT * FROM personas WHERE CEDULA=:CEDULA LIMIT 1');
    $buscar_CEDULA->execute(array(
      ':CEDULA'=>$CEDULA
    ));
    $resultado=$buscar_CEDULA->fetch();
  }else{
    header('Location: index.php');
  }


  if(isset($_POST['guardar'])){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $edad=$_POST['edad'];

    if(!empty($nombre) && !empty($apellido) && !empty($correo) && !empty($edad) ){
      if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
        echo "<script> alert('Correo no valido');</script>";
      }else{
        $consulta_update=$con->prepare(' UPDATE personas SET  
          nombre=:nombre,
          apellido=:apellido,
          correo=:correo,
          edad=:edad
          WHERE CEDULA=:CEDULA;'
        );
        $consulta_update->execute(array(
          ':nombre' =>$nombre,
          ':apellido' =>$apellido,
          ':correo' =>$correo,
          ':edad' =>$edad
        ));
        header('Location: lista.php');
      }
    }else{
      echo "<script> alert('Los campos estan vacios');</script>";
    }
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
      <li class="nav-item">
        <a class="nav-link" href="../Equipos/lista.php">Equipos</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../Pacientes/lista.php">Lista de Pacientes</a>
      </li>
    </ul>
    <span class="navbar-text">
      <a class="btn btn-primary" href="cerrar.php">Cerrar Sesion</a>
    </span>
  </div>
</nav>
  <div class="contenedor">
    <form action="" method="post">
      <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php if($resultado) echo $resultado['NOMBRE']; ?>" class="input__text">
        <label>Apellido</label>
        <input type="text" name="apellido" value="<?php if($resultado) echo $resultado['APELLIDO']; ?>" class="input__text">
      </div>
      <div class="form-group">
        <label>Correo</label>
        <input type="text" name="correo" value="<?php if($resultado) echo $resultado['CORREO']; ?>" class="input__text">
        <label>Edad</label>
        <input type="text" name="edad" value="<?php if($resultado) echo $resultado['EDAD']; ?>" class="input__text">
      </div>
      <div class="btn__group">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
        <input type="submit" name="guardar" value="Guardar" class="btn btn-primary">
      </div>
    </form>
  </div>
</body>
