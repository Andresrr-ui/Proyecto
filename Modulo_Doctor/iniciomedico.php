<?php
 session_start();
  $comparar= $_SESSION['cedula'];
    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: index.php');
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
      <li class="nav-item active">
        <a class="nav-link" href="inicioadmin.php">Home<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class="navbar-text">
      <a class="btn btn-primary" href="cerrar.php">Cerrar Sesion</a>
    </span>
  </div>
</nav>
<div class="jumbotron text-center">
  <h1>Bienvenido Doctor</h1>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-md-6">
        <a class="btn btn-primary btn-lg btn-block" href="Pacientes/lista.php" role="button">Lista de Pacientes</a>
    </div>
    <div class="col-md-6">
         <a class="btn btn-secondary btn-lg btn-block" href="Mensajes/formulario.php" role="button">Solicitud de equipo</a>
    </div>
  </div>
</div>

</body>
</html>
