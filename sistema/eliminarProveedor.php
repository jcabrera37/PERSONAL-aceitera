<?php
    session_start();
    include "../conexion.php";

    if (!empty($_POST)) {
        $IDELIMINAR = $_POST['proveedor'];
        $query_delete = mysqli_query($conection, "UPDATE `PROVEEDORES` SET `ESTATUS` = '0' WHERE `PROVEEDORES`.`ID_PROV` = '$IDELIMINAR';");
    
        if ($query_delete) {
            echo '<script type="text/javascript">
                        alert("Registro eliminado correctamente!");
                        self.location = "listaProveedores.php"
                        </script>';
        } else {
            echo '<script type="text/javascript">
                        alert("Error al eliminar el registro!");
                        self.location = "listaProveedores.php"
                        </script>';
        }
    }
    
    
    if(empty($_REQUEST['id'])){
        header("location: ../listaProveedores.php");
        //echo "request vacio";

    }
    else{
        $ID = $_REQUEST['id'];

        $query_proveedor = mysqli_query($conection, "SELECT * FROM `PROVEEDORES` WHERE ID_PROV = '$ID'");
        mysqli_close($conection);

        $resultado = mysqli_num_rows($query_proveedor);

        if ($resultado > 0) {
            while ($data = mysqli_fetch_array($query_proveedor)) {
                $cod_proveedor = $data['ID_PROV'];
                $nombre = $data['NOMBRE'];
            }
        } else {
            //header("location: listaProveedores.php");
            echo "consulta vacia";
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
    <title>Eliminar Proveedor | SerProTec - Soft</title>
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

                                                <h1>Esta seguro de eliminar el siguiente proveedor?</h1>
                                                <p><b>CODIGO: </b><span><?php echo $cod_proveedor ?></span></p>
                                                <p><b>PRODUCTO: </b><span><?php echo $nombre ?></span></p>

                                                <form method="post" action="">
                                                    <input type="hidden" name="proveedor" value="<?php echo $cod_proveedor; ?>"><br><br>
                                                    <a href="listaProveedores.php" class="btn btn-danger">Cancelar</a>
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