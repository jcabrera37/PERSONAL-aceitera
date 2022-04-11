
<header class="bg-nav">
    <div class="flex justify-between">
        <div class="p-1 mx-3 inline-flex items-center">
            <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
            <span><img src="../img/logo_aceitera.jpeg" alt="" width="75px"></span>
            <h1 class="text-white p-2">Aceitera "El Chino"</h1>
        </div>
        <div class="p-1 flex flex-row items-center">
           
        
            <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="../img/usuarioVentas.png" alt="" style="cursor: pointer;">
            <a href="#"  onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block"><?php echo $_SESSION['Nombre'],"  ", $_SESSION['Apellido'];?></a>
            <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                <ul class="list-reset">
                    <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My account</a></li>
                    <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a></li>
                    <li>
                        <hr class="border-t mx-2 border-grey-ligght">
                    </li>
                    <li><a href="../sistema/salir.php" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a></li>
                </ul>
       
            </div>
        </div>
    </div>
</header>


