<?php


session_start();
include "../conexion.php";

if (!empty($_POST)) 
{
    $prd = $_POST['proveedor'];
    $emp = $_POST['empresa'];
    $dir = $_POST['direccion'];
    $mov = $_POST['movil'];
    $fij = $_POST['fijo'];
    $nit = $_POST['nit'];
    

    $query_insert = mysqli_query($conection, "INSERT INTO `PROVEEDORES` (`ID_PROV`, `NOMBRE`, `MOVIL`, `FIJO`, `EMPRESA`, `DIRECCION`, `NIT`, `ESTATUS`) 
                                                VALUES (NULL, '$prd', '$mov', '$fij', '$emp', '$dir', '$nit', '1');");

        if($query_insert){
        echo '<script type="text/javascript">
        alert("Producto creado correctamente!");
        self.location = "listaProveedores.php"
        </script>'
        ;
        }else{
        echo '<script type="text/javascript">
        alert("Error al crear el Producto!");
        self.location = "listaProveedores.php"
        </script>'
        ;

        }


    }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <?php
    include '../includes/includes.php';
    ?>
    <title>Proveedores | SerProTec - Soft</title>
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
                        <!-- Tabla de  Productos -->

                        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                            <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                    Proveedores
                                </div>
                                <div class="p-3">
                                    <button data-modal='centeredFormModal' class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Agregar Proveedor
                                    </button>
                                </div>
                                <div class="p-3">
                                    <table class="table-responsive w-full rounded">
                                        <thead class="bg-grey-dark text-white text-normal">
                                            <tr>
                                                <th class="border w-1/10 px-4 py-2">Codigo</th>
                                                <th class="border w-1/8 px-4 py-2">Nombre</th>
                                                <th class="border w-1/8 px-4 py-2">Movil</th>
                                                <th class="border w-1/8 px-4 py-2">Fijo</th>
                                                <th class="border w-1/7 px-4 py-2">Empresa</th>
                                                <th class="border w-1/9 px-4 py-2">Dirección</th>
                                                <th class="border w-1/6 px-4 py-2">Nit</th>
                                                <th class="border w-1/7 px-4 py-2">Acciones</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php

                                        //PAGINADOR
                                        $sql_registros = mysqli_query($conection, "SELECT COUNT(*) AS total_registros FROM PROVEEDORES WHERE ESTATUS = 1;");
                                        $result_registros = mysqli_fetch_array($sql_registros);
                                        $total_registros = $result_registros['total_registros'];

                                        $reg_pagina = 10; //total de registros por paginas

                                        if (empty($_GET['pagina'])) {
                                            $pagina = 1;
                                        } else {
                                            $pagina = $_GET['pagina'];
                                        }
                                        $desde = ($pagina - 1) * $reg_pagina;
                                        $total_paginas = ceil($total_registros / $reg_pagina);

                                        $consulta_productos = mysqli_query($conection, "SELECT * FROM `PROVEEDORES` WHERE ESTATUS = '1'
                                                                                        ORDER BY NOMBRE LIMIT $desde,$reg_pagina;");
                                        $resultado = mysqli_num_rows($consulta_productos);

                                        //mysqli_close($conection);

                                        if ($resultado > 0) {
                                            while ($datos_obtenidos = mysqli_fetch_array($consulta_productos)) {
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td class="border px-4 py-2"><?php echo $datos_obtenidos['ID_PROV']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_obtenidos['NOMBRE']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_obtenidos['MOVIL']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_obtenidos['FIJO']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_obtenidos['EMPRESA']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_obtenidos['DIRECCION']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_obtenidos['NIT']; ?></td>
                                                        <td class="border px-4 py-2">
                                                            <!-- <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                                <i class="fas fa-eye"></i></a> -->
                                                            <a href="../sistema/vistaProveedores.php?id=<?php echo $datos_obtenidos['ID_PROV'];?>" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                                <i class="fas fa-eye"></i></a>
                                                            <a href="../sistema/eliminarProveedor.php?id=<?php echo $datos_obtenidos['ID_PROV'];?>" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>


                                            <?php
                                            }
                                        }


                                            ?>



                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/ Tabla de Productos -->
                    </div>
                    <!-- PAGINADOR -->
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">

                        <div class="mb-2 border-solid border-gray-200 rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
                            <div class="p-3">
                                <div class="inline-flex">
                                    <li style="text-decoration: none; list-style: none;" class="bg-gray-200 hover:bg-gray-500 text-gray-900 font-bold py-2 px-4 rounded-l">
                                        <a class="page-link" href="?pagina=<?php echo 1; ?>">Primer</a>
                                    </li>

                                    <?php
                                    for ($i = 1; $i <= $total_paginas; $i++) {
                                        if ($i == $pagina) {
                                            echo '<li style="text-decoration: none; list-style: none;" class="bg-gray-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-full"><a class="page-link">' . $i . '</a></li>';
                                        } else {
                                            echo '<li style="text-decoration: none; list-style: none;" class="bg-blue-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-full"><a class="page-link" href="?pagina=' . $i . '">' . $i . '</a></li>';
                                        }
                                    }
                                    ?>

                                    <li style="text-decoration: none; list-style: none;" class="bg-gray-200 hover:bg-gray-500 text-gray-900 font-bold py-2 px-4 rounded-r">
                                        <a class="page-link" href="?pagina=<?php echo $total_paginas; ?>">Última</a>
                                    </li>

                                </div>


                            </div>


                        </div>
                    </div>
                    <!--  PAGINADOR  -->
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

    <!-- Modal agregar proveedor -->
    <div id='centeredFormModal' class="modal-wrapper">
        <div class="overlay close-modal"></div>
        <div class="modal modal-centered">
            <div class="modal-content shadow-lg p-5">
                <div class="border-b p-2 pb-3 pt-0 mb-4">
                    <div class="flex justify-between items-center">
                        AGREGAR PROVEEDOR
                        <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                            <i class="fas fa-times text-gray-700"></i>
                        </span>
                    </div>
                </div>
                <!-- Modal content -->
                <form id='form_id' class="w-full" method="POST">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                Nombre del Proveedor
                            </label>
                            <input class="appearance-none block w-full border border-grey-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" 
                            id="grid-first-name" type="text" name="proveedor" placeholder="Proveedor">
                            
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                Nombre de la Empresa
                            </label>
                            <input class="appearance-none block w-full border border-grey-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" 
                            id="grid-first-name" type="text" name="empresa" placeholder="Empresa">
                            
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                Dirección de la empresa
                            </label>
                            <input class="appearance-none block w-full  border border-grey-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" 
                            id="grid-first-name" type="text" name="direccion" placeholder="Dirección, Calle, Zona, Ciudad">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                Teléfono Movil
                            </label>
                            <input class="appearance-none block w-full border border-grey-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" 
                            id="grid-first-name" type="text" name="movil" placeholder="Movil">
                            
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                                Telêfono Fijo
                            </label>
                            <input class="appearance-none block w-full border border-grey-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" 
                            id="grid-first-name" type="text" name="fijo" placeholder="Fijo">
                            
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                Nit
                            </label>
                            <input class="appearance-none block w-full border border-grey-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" 
                            id="grid-first-name" type="text" name="nit" placeholder="NIT">
                            
                        </div>
                        
                        
                    </div>

                    <div class="mt-5">
                        <input type="submit" class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded' value="Guardar" style="cursor: pointer;">
                        <!-- <button class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> Guardar </button> -->
                        <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                            Cerrar
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../main.js"></script>

</body>

</html>