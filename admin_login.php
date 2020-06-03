<?php
    include_once 'database.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
             case 1:
                    header('location: Modulo_Admin/inicioadmin.php');
                break;

                case 2:
                header('location: Modulo_Doctor/iniciomedico.php');
                break;

                default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM admin WHERE usuario = :username AND password = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[2];
            
            $_SESSION['cedula'] = $cedula;
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: Modulo_Admin/inicioadmin.php');
                break;

                case 2:
                header('location: Modulo_Doctor/iniciomedico.php');
                break;

                default:
            }
        }else{ 
            echo "Nombre de usuario o contraseña incorrecto";
        }
        

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inicio de sesion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
</head>
<body>
  <div class="form-group">
    <form id="login-form" method="POST">
        <h2>Iniciar Admin</h2>
        <p>Nombre de usuario: <br>
        <input type="text" class="form-control" name="username"></p>
        <p>Password: <br>
        <input type="password" class="form-control" name="password"></p>
        <p class="center"><input type="submit" class="btn btn-primary" value="Iniciar Sesión"></p>
    </form>
<br>
<a href="index.php">Volver a login medico</a>
</div>
    <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }

       ?>
</body>
</html>