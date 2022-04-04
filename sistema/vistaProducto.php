<?php

use LDAP\Result;

session_start();
include "../conexion.php";

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
                                    <form class="w-full">
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                                    Codigo de producto
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" id="grid-first-name" type="text" 
                                                placeholder="Codigo" readonly value="<?php echo $id;?>">

                                            </div>
                                            <div class="w-full md:w-1/4 px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-last-name">
                                                    UNIDAD DE MEDIDA
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" id="grid-last-name" type="text" 
                                                placeholder="Marca del producto" readonly value="<?php echo $um;?>">
                                            </div>
                                            <div class="w-full md:w-1/2 px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-last-name">
                                                    Descripción de Producto
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" id="grid-last-name" type="text" 
                                                placeholder="Descripción de producto" readonly value="<?php echo $des;?>">
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full md:w-1/3 px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-last-name">
                                                    NOMBRE DEL PRODUCTO
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" id="grid-last-name" type="text" 
                                                placeholder="Marca del producto" readonly value="<?php echo $prod;?>">
                                            </div>
                                            <div class="w-full md:w-1/3 px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-last-name">
                                                    MARCA
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" id="grid-last-name" type="text" 
                                                placeholder="Marca del producto" readonly value="<?php echo $marca;?>">
                                            </div>
                                            <div class="w-full md:w-1/3 px-3">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-last-name">
                                                    CATEGORIA
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" id="grid-last-name" type="text" 
                                                placeholder="Marca del producto" readonly value="<?php echo $cat;?>">
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap -mx-4 mb-2">
                                            <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-city">
                                                    Existencia actual
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" 
                                                id="grid-city" type="text" readonly value="<?php echo $existencia;?>">
                                            </div>
                                            <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-city">
                                                    Precio de venta
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" 
                                                id="grid-city" type="text" readonly value="<?php echo $pVta;?>">
                                            </div>
                                            <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-zip">
                                                    Precio costo
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" 
                                                id="grid-zip" type="text" readonly value="<?php echo $pCto;?>">
                                            </div>
                                            <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-zip">
                                                    Ingresos
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" 
                                                id="grid-zip" type="text" readonly value="<?php echo $ing;?>">
                                            </div>
                                            <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-zip">
                                                    Salidas
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" 
                                                id="grid-zip" type="text" readonly value="<?php echo $sal;?>">
                                            </div>
                                        </div>

                                        <div class="" >
                                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-300 border-b">
                                                Acciones
                                            </div>
                                            <div class="p-3">
                                                <a href="../sistema/editarProducto.php?id=<?php echo $id;?>" class="bg-blue-500 hover:bg-blue-700  text-white font-bold py-2 px-8 rounded">Modificar Registro</a>
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