<?php
session_start();
if ($_SESSION['Tipo'] != 'ADMINISTRADOR') 
	{
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
                                <div class="table-responsive">
                                    <table class="table text-grey-darkest">
                                        <thead class="bg-grey-dark text-white text-normal">
                                            <tr>
                                                <th scope="col">Codigo.</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Password</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $consulta_usuarios = mysqli_query($conection, "SELECT * FROM `USUARIOS` WHERE ESTATUS = 0;");
                                            $resultado = mysqli_num_rows($consulta_usuarios);
                                            mysqli_close($conection);

                                            if($resultado > 0){
                                                while($datos_de_usuarios = mysqli_fetch_array($consulta_usuarios)){
                                                    ?>
                                        <tbody>
                                            <td><?php echo $datos_de_usuarios['ID_USER'];?></td>
                                            <td><?php echo $datos_de_usuarios['USER'];?></td>
                                            <td><?php echo $datos_de_usuarios['PASSWORD'];?></td>
                                            <td><?php echo $datos_de_usuarios['NOMBRE'];?></td>
                                            <td><?php echo $datos_de_usuarios['APELLIDOS'];?></td>
                                            <td><?php echo $datos_de_usuarios['TIPO'];?></td>
                                            <td><a href="" class="btn-ver">Ver </a> | <a href="" class="btn-eliminar"> Eliminar</a></td>
                                        </tbody>

                                        <?php
                                                }//fin de while datos


                                            }//fin de if resultado

                                            
                                        
                                        ?>
                                        
                                    </table>
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