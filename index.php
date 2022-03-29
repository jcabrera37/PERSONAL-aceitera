<?php
session_start();
$mensaje="";
if(!empty($_SESSION['active']))
{
  header('location: sistema/aceiteraHome.php');

}
else{
  if(!empty($_POST))
  {
  if(empty($_POST['login']) || empty($_POST['pass']))
  {
    $mensaje = "Ingrese usuario y Contraseña";

  } else{
    require_once "conexion.php";
    $usuario = $_POST['login'];
    $contrasena = $_POST['pass'];

    $query = mysqli_query($conection, "SELECT * FROM USUARIOS WHERE USER = '$usuario' AND PASSWORD = '$contrasena' AND ESTATUS = '0'");
				mysqli_close($conection);
				$result = mysqli_num_rows($query);

        if ($result > 0) 
				{
          
          $data = mysqli_fetch_array($query);

          $_SESSION['active'] = true;

					//$_SESSION['idUser'] = $data['ID_USER'];
                    $_SESSION['User'] = $data['USER'];
					$_SESSION['Nombre'] = $data['NOMBRE'];
					$_SESSION['Apellido'] = $data['APELLIDOS'];
					$_SESSION['Tipo'] = $data['TIPO'];
					

          if($_SESSION['Tipo'] == 'ADMINISTRADOR')
          {
            ?>
            <meta http-equiv="refresh" content="0.5; url= sistema/aceiteraHome.php"/>
                  <script language = javascript>
                  alert("Bienvenido Administrador!")
                  </script>
            <?php
          }else{
            ?>
            <meta http-equiv="refresh" content="1; url= sistema/vistaVentas.php"/>
                  <script language = javascript>
                  alert("Bienvenido!")
                  </script>
            <?php
          }
        }else{
          $mensaje = "Datos de inicio de sesión incorrectos";
          session_destroy();
            
        }
      }
    }
  }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <title>Serprotec-Soft - Login</title>
</head>

<body>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <img src="img/logo_aceitera.jpeg" id="icon" alt="User Icon" />
            </div>
            <form action="" method="post" >
                <input class="input-text" type="text" id="login" class="fadeIn second" name="login" placeholder="Usuario">
                <input class="input-text" type="password" id="password" class="fadeIn third" name="pass" placeholder="Clave">
                <input type="submit" class="fadeIn fourth" value="Iniciar sesión">
            </form>
            <span class="msj-error">
                <?php echo $mensaje; ?>
            </span>
            <div id="formFooter">
                <a class="underlineHover" href="">Olvidó su contraseña?</a>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>