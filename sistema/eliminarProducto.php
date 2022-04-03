<?php

session_start();
include "../conexion.php";
//Eliminar el registro

if (!empty($_POST)) {
  $IDELIMINAR = $_POST['IDPRODUCTO'];
  $query_delete = mysqli_query($conection, "UPDATE `PRODUCTO` SET `ESTATUS` = '0' WHERE `PRODUCTO`.`ID_PRODUCTO` = '$IDELIMINAR';");
  
  if ($query_delete) {
    echo '<script type="text/javascript">
                    alert("Registro eliminado correctamente!");
                    self.location = "vistaProductos.php"
                    </script>';
  } else {
    echo '<script type="text/javascript">
                    alert("Error al eliminar el registro!");
                    self.location = "vistaProductos.php"
                    </script>';
  }
}

//llenar datos del usuario seleccionado
if (empty($_REQUEST['id'])) {
    header("location: ../sistema/vistaProductos.php");
    mysqli_close($conection);
  } else {
  
    $IDPRODUCTO = $_REQUEST['id'];
    
    $query = mysqli_query($conection, "SELECT * FROM `PRODUCTO` WHERE ID_PRODUCTO = '$IDPRODUCTO';");
    mysqli_close($conection);
    $result = mysqli_num_rows($query);
    if ($result > 0) {
      while ($data = mysqli_fetch_array($query)) {
        $COD_PRODUCTO = $data['ID_PRODUCTO'];
        $NOMBRE = $data['PRODUCTO'];
      }
    } else {
      header("location: vistaProductos.php");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Css -->
    <?php
    include '../includes/includes.php';
    ?>
    <title>Productos | SerProTec - Soft</title>
</head>

<body>
    <!--Container -->
    <div class="mx-auto bg-grey-lightest">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->
            <?php
            include '../includes/header.php';
            ?>
            <!--/Header-->

            <div class="flex flex-1">
                <!--Sidebar-->
                <?php
                include '../includes/aside.php';
                ?>
                <!--/Sidebar-->
                <!--Main-->
                <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                    <div class="flex flex-col">
                        <div class="content-wrapper">
                            <div class="row">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="bg-red-300 mb-2 border border-red-300 text-red-dark px-4 py-3 rounded relative">Eliminar Producto</h4>
                                            <div class="table-responsive">

                                                <h2>Esta seguro de eliminar el siguiente producto?</h2>
                                                <p><b>CODIGO: </b><span><?php echo $COD_PRODUCTO ?></span></p>
                                                <p><b>PRODUCTO: </b><span><?php echo $NOMBRE ?></span></p>

                                                <form method="post" action="">
                                                    <input type="text" name="IDPRODUCTO" value="<?php echo $IDPRODUCTO; ?>">
                                                    <a href="VistaProductos.php" class="btn btn-danger">Cancelar</a>
                                                    <input type="submit" value="Aceptar" class="btn btn-primary">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </main>
                <!--/Main-->
            </div>



            <!--Footer-->
            <?php
                include "../includes/footer.php";
            ?>
            <!--/footer-->

        </div>

    </div>
    <script src="../main.js"></script>

</body>

</html>