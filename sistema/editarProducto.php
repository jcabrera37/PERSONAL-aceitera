<?php

use LDAP\Result;

session_start();
include "../conexion.php";

if (!empty($_POST)) 
{
    $id_prod = $_POST['id_producto'];
    $prod = $_POST['producto'];
    $unme = $_POST['unidadMedida'];
    $desc = $_POST['descripcion'];
    $pVta = $_POST['precioVenta'];
    $pCto = $_POST['costo'];
    $marc = $_POST['marca'];
    $catg = $_POST['categoria'];
    $ingresos = $_POST['ingresos'];
    $salidas = $_POST['salidas'];
    $existenciaU = $_POST['existencia'];

    $query_insert = mysqli_query($conection, "UPDATE `producto` SET `PRODUCTO` = '$prod', 
    `UM` = '$unme', 
    `DESCRIPCION` = '$desc', 
    `PRC_VENTA` = '$pVta', `PRC_COSTO` = '$pCto', 
    `MARCA` = '$marc', `CATEGORIA` = '$catg', 
    `ESTATUS` = '1', `EXISTENCIA` = '$existenciaU', 
    `INGRESOS` = '$ingresos', `SALIDAS` = '$salidas' 
    WHERE `producto`.`ID_PRODUCTO` = '$id_prod';");

    //echo $query_insert;

        if($query_insert){
        echo '<script type="text/javascript">
        alert("Producto modificado correctamente!");
        </script>';
        
        ?>
            <meta http-equiv="refresh" content="0.3; url= vistaProducto.php?id=<?php echo $id_prod;?>"/>
        <?php
        }else{
        echo '<script type="text/javascript">
        alert("Error al modificar el Producto!");
        self.location = "vistaProductos.php"
        </script>'
        ;

        }


}


if (empty($_REQUEST['id'])) {
    header("location: ../sistema/vistaProductos.php");
    mysqli_close($conection);
} else {

    $IDPRODUCTO = $_REQUEST['id'];

    $query = mysqli_query($conection, "SELECT * FROM `PRODUCTO` WHERE ID_PRODUCTO = '$IDPRODUCTO';");
    
    $result = mysqli_num_rows($query);
    if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {
            $id = $data['ID_PRODUCTO'];
            $prod = $data['PRODUCTO'];
            $um = $data['UM'];
            $des = $data['DESCRIPCION'];
            $pVta = $data['PRC_VENTA'];
            $pCto = $data['PRC_COSTO'];
            $marca = $data['MARCA'];
            $cat = $data['CATEGORIA'];
            $sta = $data['ESTATUS'];
            $existencia = $data['EXISTENCIA'];
            $ing = $data['INGRESOS'];
            $sal = $data['SALIDAS'];
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

    <?php include "../includes/includes.php"; ?>
    <title>Editar Producto</title>
</head>

<body>
    <!--Container -->
    <div class="mx-auto bg-grey-lightest">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->
            <?php include "../includes/header.php"; ?>
            <!--/Header-->

            <div class="flex flex-1">
                <!--Sidebar-->
                <?php include "../includes/aside.php"; ?>
                <!--/Sidebar-->
                <!--Main-->
                <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                    <div class="flex flex-col">
                        <!--Grid Form-->

                        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                            <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                    Editar Productos
                                </div>
                                <div class="p-3">
                                    <form method="POST" class="w-full">
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                                    Codigo de producto
                                                </label>
                                                <input name="id_producto" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" id="grid-first-name" type="text" placeholder="Codigo" value="<?php echo $id; ?>" readonly>

                                            </div>
                                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                                                    Unidad de Medida
                                                </label>
                                                <?php
                                                $query_um = mysqli_query($conection, "SELECT * FROM `UM` where ESTATUS = 1");
                                                $result_um = mysqli_num_rows($query_um);
                                                
                                                ?>
                                                <div class="relative">
                                                    <select class="block appearance-none w-full  border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey" name="unidadMedida" id="grid-state">
                                                        <option ><?php echo $um; ?></option>
                                                        <?php
                                                        if ($result_um > 0) {
                                                            while ($data_um = mysqli_fetch_array($query_um)) {
                                                        ?>
                                                                <option><?php echo $data_um['UNIDAD_MEDIDA']; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full md:w-1/2 px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-last-name">
                                                    Descripción de Producto
                                                </label>
                                                <input name="descripcion" class="appearance-none block w-full bg-white-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" id="grid-last-name" type="text" placeholder="Descripción de producto" value="<?php echo $des; ?>">
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full md:w-1/3 px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-last-name">
                                                    NOMBRE DEL PRODUCTO
                                                </label>
                                                <input name="producto" class="appearance-none block w-full bg-white-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" id="grid-last-name" type="text" 
                                                placeholder="Marca del producto" value="<?php echo $prod;?>">
                                            </div>
                                            <div class="w-full md:w-1/3 px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-last-name">
                                                    MARCA
                                                </label>
                                                <input name="marca" class="appearance-none block w-full bg-white-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" id="grid-last-name" type="text" placeholder="Marca del producto" value="<?php echo $marca; ?>">
                                            </div>
                                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                                                    CATEGORIA
                                                </label>
                                                <?php
                                                $query_um = mysqli_query($conection, "SELECT * FROM `categorias` WHERE ESTATUS = 1");
                                                $result_um = mysqli_num_rows($query_um);
                                                mysqli_close($conection);
                                                ?>
                                                <div class="relative">
                                                    <select class="block appearance-none w-full  border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey" name="categoria" id="grid-state">
                                                        <option ><?php echo $cat;?></option>
                                                        <?php
                                                        if ($result_um > 0) {
                                                            while ($data_um = mysqli_fetch_array($query_um)) {
                                                        ?>
                                                                <option><?php echo $data_um['CATEGORIA']; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="w-full md:w-1/2 px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-last-name">
                                                    CATEGORIA
                                                </label>
                                                <input class="appearance-none block w-full bg-white-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" id="grid-last-name" type="text" 
                                                placeholder="Marca del producto"  value="<?php echo $cat; ?>">
                                            </div> -->
                                        </div>

                                        <div class="flex flex-wrap -mx-4 mb-2">
                                            <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-city">
                                                    Existencia actual
                                                </label>
                                                <input name="existencia" class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" 
                                                id="grid-city" type="text"  value="<?php echo $existencia; ?>" readonly>
                                            </div>
                                            <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-city">
                                                    Precio de venta
                                                </label>
                                                <input name="precioVenta" class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey" 
                                                id="grid-city" type="text" value="<?php echo $pVta; ?>">
                                            </div>
                                            <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-zip">
                                                    Precio costo
                                                </label>
                                                <input name="costo" class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey" 
                                                id="grid-zip" type="text" value="<?php echo $pCto; ?>">
                                            </div>
                                            <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-zip">
                                                    Ingresos
                                                </label>
                                                <input name="ingresos" class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" 
                                                id="grid-zip" type="text" value="<?php echo $ing; ?>" readonly>
                                            </div>
                                            <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-zip">
                                                    Salidas
                                                </label>
                                                <input name="salidas" class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" 
                                                id="grid-zip" type="text" value="<?php echo $sal; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-300 border-b">
                                                Acciones
                                            </div>
                                            <div class="p-3">
                                                <input class="bg-blue-500 hover:bg-blue-700  text-white font-bold py-2 px-8 rounded" type="submit" value="Guardar Cambios">
                                                
                                                <a href="../sistema/vistaProductos.php" class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-8 rounded">Cancelar</a>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/Grid Form-->
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

    <script src="./main.js"></script>

</body>

</html>