<?php
session_start();
include "../conexion.php";
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
                        <!--División Productos -->

                        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                            <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                    Productos
                                </div>
                                <div class="p-3">
                                    <button data-modal='centeredFormModal' class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Agregar Productos
                                    </button>
                                </div>
                                <div class="p-3">
                                    <table class="table-responsive w-full rounded">
                                        <thead>
                                            <tr>
                                                <th class="border w-1/7 px-4 py-2">Codigo</th>
                                                <th class="border w-1/4 px-4 py-2">Producto</th>
                                                <th class="border w-1/4 px-4 py-2">Descripción</th>
                                                <th class="border w-1/6 px-4 py-2">Marca</th>
                                                <th class="border w-1/7 px-4 py-2">Precio Venta</th>
                                                <th class="border w-1/9 px-4 py-2">Existencia</th>
                                                <th class="border w-1/4 px-4 py-2">Acciones</th>
                                            </tr>
                                        </thead>
                                        <?php

                                            $consulta_productos = mysqli_query($conection, "SELECT * FROM `PRODUCTO` WHERE ESTATUS = '0';");
                                            $resultado = mysqli_num_rows($consulta_productos);
                                            mysqli_close($conection);

                                            if($resultado > 0){
                                                while($datos_obtenidos = mysqli_fetch_array($consulta_productos)){
                                                    ?>
                                                <tbody>
                                                    <tr>
                                                        <td class="border px-4 py-2"><?php echo $datos_obtenidos['ID_PRODUCTO']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_obtenidos['PRODUCTO']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_obtenidos['DESCRIPCION']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_obtenidos['MARCA']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_obtenidos['PRC_VENTA']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_obtenidos['EXISTENCIA']; ?></td>
                                                        <td class="border px-4 py-2">
                                                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                                <i class="fas fa-eye"></i></a>
                                                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                                <i class="fas fa-edit"></i></a>
                                                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
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
                        <!--/División Productos -->
                    </div>
                </main>
                <!--/Main-->
            </div>



            <!--Footer-->
            <footer class="bg-grey-darkest text-white p-2">
                <div class="flex flex-1 mx-auto">&copy; My Design</div>
            </footer>
            <!--/footer-->

        </div>

    </div>

    <!-- Centered With a Form Modal -->
    <div id='centeredFormModal' class="modal-wrapper">
        <div class="overlay close-modal"></div>
        <div class="modal modal-centered">
            <div class="modal-content shadow-lg p-5">
                <div class="border-b p-2 pb-3 pt-0 mb-4">
                    <div class="flex justify-between items-center">
                        AGREGAR PRODUCTOS
                        <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                            <i class="fas fa-times text-gray-700"></i>
                        </span>
                    </div>
                </div>
                <!-- Modal content -->
                <form id='form_id' class="w-full">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                Nombre del Producto
                            </label>
                            <input class="appearance-none block w-full border border-grey-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" id="grid-first-name" type="text" placeholder="Producto">
                            <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                                Unidad de Medida
                            </label>
                            <div class="relative">
                                <select class="block appearance-none w-full  border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-state">
                                    <option>GLN</option>
                                    <option>LITRO</option>
                                    <option>1/2 LITRO</option>
                                    <option>UNIDAD</option>
                                    <option>METRO</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                Descripción del Producto
                            </label>
                            <input class="appearance-none block w-full  border border-grey-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" id="grid-first-name" type="text" placeholder="Producto">
                        </div>
                        
                    </div>
   
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-city">
                                City
                            </label>
                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-city" type="text" placeholder="Albuquerque">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-state">
                                State
                            </label>
                            <div class="relative">
                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-state">
                                    <option>New Mexico</option>
                                    <option>Missouri</option>
                                    <option>Texas</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-zip">
                                Zip
                            </label>
                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-zip" type="text" placeholder="90210">
                        </div>
                    </div>

                    <div class="mt-5">
                        <button class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> Submit </button>
                        <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                            Close
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../main.js"></script>

</body>

</html>