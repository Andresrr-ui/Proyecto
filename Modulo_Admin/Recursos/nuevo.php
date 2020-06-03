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
  if(isset($_POST['guardar'])){
    $cedula=$_POST['cedula'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $edad=$_POST['edad'];
    
    if(!empty($cedula) && !empty($nombre) && !empty($apellido) && !empty($correo) && !empty($edad) ){
      if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
        echo "<script> alert('Correo no valido');</script>";
      }else{
        $cons=$con->prepare('INSERT INTO Personas (Cedula, Nombre, Apellido, Correo, Edad) VALUES(:cedula,:nombre,:apellido,:correo,:edad)');
        $cons->execute(array(
          ':cedula' =>$cedula,
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

<body>
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
      <li class="nav-item active">
        <a class="nav-link" href="../Recursos/lista.php">Recursos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Equipos/lista.php">Equipos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Pacientes/lista.php">Lista de Pacientes</a>
      </li>
    </ul>
    <span class="navbar-text">
      Cerrar sesion
    </span>
  </div>
</nav>
<body>
  <div class="contenedor">
    <form action="" method="post">
      <div class="form-group">
        <input type="text" name="cedula" placeholder="Cedula" class="input__text">
        <input type="text" name="nombre" placeholder="nombre" class="input__text">
      </div>
      <div class="form-group">
        <input type="text" name="apellido" placeholder="Apellido" class="input__text">
        <input type="text" name="correo" placeholder="Correo" class="input__text">
        <input type="text" name="edad" placeholder="Edad" class="input__text">
      </div>
      <div class="btn__group">
        <a href="lista.php" class="btn btn-danger">Cancelar</a>
        <input type="submit" name="guardar" value="Guardar" class="btn btn-primary">
      </div>
    </form>
  </div>
</body>
</html>