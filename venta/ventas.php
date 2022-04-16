
<?php
    session_start();
    if ($_SESSION['Tipo'] != 'VENTAS') {
        header("location: ../");
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <?php include "../includes/includes.php" ?>
    <title>Inicio | SerProTec Soft</title>
</head>

<body>

    <!--Container -->
    <div class="mx-auto bg-grey-400">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->

            <header>
                <div class="container">


                    <div class="row align-items-stretch justify-content-between ">
                        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                            <!-- <a class="navbar-brand" href="../sistema/vistaVentas.php"></a> -->
                            <span><img src="../img/logo_aceitera.jpeg" alt="" width="75px"></span>
                            <a href="../sistema/vistaVentas.php" style="text-decoration: none; cursor:pointer">
                                <h1 class="text-white p-1">Aceitera "El Chino"</h1>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item dropdown">
                                        <img src="img/cart.webp" class="nav-link dropdown-toggle img-fluid" height="70px" width="70px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></img>
                                        <div id="carrito" class="dropdown-menu" aria-labelledby="navbarCollapse">
                                            <table id="lista-carrito" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Imagen</th>
                                                        <th>Nombre</th>
                                                        <th>Precio</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>

                                            <a href="#" id="vaciar-carrito" class="btn btn-danger btn-block">Vaciar Carrito</a>
                                            <a href="#" id="procesar-pedido" class="btn btn-primary btn-block">Procesar
                                                Compra</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>

                    </div>

                </div>

            </header>
            <!--/Header-->
            <br><br><br><br>
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
                        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                            <!--Horizontal form-->
                            <div class="mb-2 md:mx-2 lg:mx-2 border-solid border-gray-200 rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">

                                <div class="p-3">
                                    <form class="w-full">
                                        <div class="flex items-center border-b border-b-1 border-blue-500 py-2">
                                            <input class="appearance-none bg-transparent border-none w-full text-gray-600 mr-3 py-1 px-2 lineHeight-tight focus:outline-none" 
                                            type="text" placeholder="Buscar producto..." aria-label="Full name" id="caja_busqueda" name="caja_busqueda">
                                            <button class="flex-shrink-0 bg-blue-500 hover:bg-blue-dark-700 border-blue-500 hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded" type="button">
                                                Buscar
                                            </button>

                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!--/Horizontal form-->
                        </div>
                        <!-- /Stats Row Ends Here -->
                        
                        <!-- Lista de productos desde js-->
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                            <div class="table-responsive" id="lista-productos">

                            </div>
                        </div>
                    </div>
                </main>
                <!--/Main-->
            </div>
            <!--Footer-->
            <?php include "../includes/footer.php" ?>
            <!--/footer-->

        </div>

    </div>
    <script src="../main.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="../venta/js/carrito.js"></script>
    <script src="../venta/js/pedido.js"></script>
    <script src="../main.js"></script>
    <script src="../venta/js/buscar.js"></script>
    <script src="../venta/js/jquery-3.6.0.min.js"></script>
    <script src="../venta/js/popper.min.js"  ></script>
</body>

</html>