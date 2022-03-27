<?php
session_start();
if ($_SESSION['Tipo'] != 'ADMINISTRADOR') {
    header("location: ../sistema/vistaVentas.php");
}

include "../conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="../dist/styles.css">
    <link rel="stylesheet" href="../dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="../dist/estilos.css">
    <title>Inicio | SerProTec Soft</title>
</head>

<body>
    <!--Container -->
    <div class="mx-auto bg-grey-400">
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
                <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                    <div class="flex flex-col">
                        <!-- Stats Row Starts Here -->
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                            <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                                <div class="p-4 flex flex-col">
                                    <a href="#" class="no-underline text-white text-2xl">
                                        Q244
                                    </a>
                                    <a href="#" class="no-underline text-white text-lg">
                                        Total Ventas
                                    </a>
                                </div>
                            </div>

                            <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                                <div class="p-4 flex flex-col">
                                    <a href="#" class="no-underline text-white text-2xl">
                                        Q199.4
                                    </a>
                                    <a href="#" class="no-underline text-white text-lg">
                                        Total Compras
                                    </a>
                                </div>
                            </div>

                            <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                                <div class="p-4 flex flex-col">
                                    <a href="#" class="no-underline text-white text-2xl">
                                        900
                                    </a>
                                    <a href="#" class="no-underline text-white text-lg">
                                        Total Usuarios
                                    </a>
                                </div>
                            </div>

                            <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
                                <div class="p-4 flex flex-col">
                                    <a href="#" class="no-underline text-white text-2xl">
                                        500
                                    </a>
                                    <a href="#" class="no-underline text-white text-lg">
                                        Total Productos
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- /Stats Row Ends Here -->

                        <!-- Card Sextion Starts Here -->
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                            <!-- card -->

                            <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                                <div class="px-6 py-2 border-b border-light-grey">
                                    <div class="font-bold text-xl">Usuarios Registrados</div>
                                </div>
                               
                                <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                                    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                                        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                            Full Table
                                        </div>
                                        <div class="p-3">
                                            <table class="table-responsive w-full rounded">
                                                <thead>
                                                    <tr>
                                                        <th class="border w-1/4 px-4 py-2">Código</th>
                                                        <th class="border w-1/6 px-4 py-2">Nombre</th>
                                                        <th class="border w-1/6 px-4 py-2">Apellido</th>
                                                        <th class="border w-1/6 px-4 py-2">Usuario</th>
                                                        <th class="border w-1/7 px-4 py-2">Contraseña</th>
                                                        <th class="border w-1/7 px-4 py-2">Estatus</th>
                                                        <th class="border w-1/5 px-4 py-2">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                    $consulta_usuarios = mysqli_query($conection, "SELECT * FROM `USUARIOS`");
                                                    $resultado = mysqli_num_rows($consulta_usuarios);
                                                    mysqli_close($conection);
            
                                                    if ($resultado > 0) {
                                                        while ($datos_de_usuarios = mysqli_fetch_array($consulta_usuarios)) {
                                                    ?>
                                                
                                                <tbody>
                                                    <tr>
                                                        <td class="border px-4 py-2"><?php echo $datos_de_usuarios['ID_USER']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_de_usuarios['NOMBRE']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_de_usuarios['APELLIDOS']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_de_usuarios['USER']; ?></td>
                                                        <td class="border px-4 py-2"><?php echo $datos_de_usuarios['PASSWORD']; ?></td>
                                                        <td class="border px-4 py-2">
                                                            <?php
                                                                if($datos_de_usuarios['ESTATUS'] == 0){
                                                                    ?>
                                                                    <i class="fas fa-check text-green-500 mx-2"></i>
                                                                    <?php       
                                                                }else{
                                                                    ?>
                                                                    <i class="fas fa-times text-red-500 mx-2"></i>
                                                                    <?php 
                                                                }
                                                            ?>
                                                         <!--   -->
                                                        </td>
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
                            </div>
                            <!-- /card -->

                        </div>
                        <!-- /Cards Section Ends Here -->
                        <!--/Profile Tabs-->
                    </div>
                </main>
                <!--/Main-->
            </div>
            <!--Footer-->
            <footer class="bg-grey-darkest text-white p-2">
                <div class="flex flex-1 mx-auto">&copy; SerProTec - Software</div>
                <div class="flex flex-1 mx-auto">Powered by: <a href="" target=" _blank">SerProTec</a></div>
            </footer>
            <!--/footer-->

        </div>

    </div>
    <script src="../main.js"></script>
</body>

</html>