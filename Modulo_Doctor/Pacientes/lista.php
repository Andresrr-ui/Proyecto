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
<?php
   include_once dirname(__FILE__) . '../config.php';
            $str_datos = "";
             $con=mysqli_connect(HOST_DB,USUARIO_DB,USUARIO_PASS,NOMBRE_DB);
                if (mysqli_connect_errno()) {
                $str_datos.= "Error en la conexión: " . mysqli_connect_error();
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
        <a class="nav-link" href="../iniciomedico.php">Home<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class="navbar-text">
     <a class="btn btn-primary" href="cerrar.php">Cerrar Sesion</a>
    </span>
  </div>
</nav>
  <br>
  <div class="contenedor">
        <table class="table table-dark">
            <tr class="head">
                <td>Cedula</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Correo</td>
                <td>Edad</td>
                <td colspan="2">Acción</td>     
            </tr>    
        <?php
            $sql = "SELECT * from personas";
            $resultado = mysqli_query($con,$sql);
            while($fila = mysqli_fetch_array($resultado)) {
         ?>
           <tr>
           <td><?php echo $fila['CEDULA']?></td>
           <td><?php echo $fila['NOMBRE']?></td>
           <td><?php echo $fila['APELLIDO']?></td>
           <td><?php echo $fila['CORREO']?></td>
           <td><?php echo $fila['EDAD']?></td>
           <td><a class="btn btn-primary" href="Equipos/lista.php" role="button">Administrar equipos</a></td>
          <td><a href="delete.php?CEDULA=<?php echo $fila['CEDULA']; ?>" class="btn__delete">Eliminar</a></td>    
       </tr>
    <?php
   }
    ?>
        </table>  
<a class="btn btn-primary" href="nuevo.php" role="button">Agregar Administrador</a>
        </div>         
    </body>
</html>