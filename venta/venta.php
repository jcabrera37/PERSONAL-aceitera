<?php
session_start();

include "../conexion.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <?php include "../includes/includes.php" ?>
    <title>Venta | SerProTec Soft</title>

</head>

<body>

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
                                <img src="img/cart.webp" class="nav-link dropdown-toggle img-fluid" height="70px" width="70px" href="#" 
                                id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></img>
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

    <main>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-1 my-4 mx-auto text-left">

            <p class="display-6 mt-3"></p>

        </div>

        <!--Grid Form-->

        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
            <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                    Buscar producto
                </div>
                <div class="p-3">
                    <form class="w-full">

                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">

                                <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey" 
                                id="caja_busqueda" name="caja_busqueda" type="text" placeholder="Buscar producto...">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Lista de productos desde js-->
        <div id="lista-productos">

        </div>
    </main>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/carrito.js"></script>
    <script src="js/pedido.js"></script>
    <script src="../main.js"></script>
    <script src="../venta/js/buscar.js"></script>
    <script src="../venta/js/jquery-3.6.0.min.js"></script>


</body>

</html>