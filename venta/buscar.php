<?php
include "../conexion.php";

$salida = "";
$query = "SELECT * FROM `PRODUCTO` ORDER BY ID_PRODUCTO;";

if(isset($_POST['consulta'])){
    $q = ($_POST['consulta']);
    $query = "SELECT ID_PRODUCTO, PRODUCTO, UM, DESCRIPCION, PRC_VENTA, MARCA FROM PRODUCTO 
    WHERE PRODUCTO LIKE '%".$q."%'";
}
$queryb = mysqli_query($conection, $query);
$resultado = mysqli_num_rows($queryb);

if ($resultado > 0){
    $salida.="
        <table class='table text-grey-darkest'>
            <thead>            
                <tr>
                    <td>IMAGEN</td>
                    <td>ID</td>
                    <td>PRODUCTO</td>
                    <td>UM</td>
                    <td>DESCRIPCION</td>
                    <td>PRECIO</td>
                    <td>MARCA</td>
                    <td>ACCIONES</td>
                </tr>
            </thead>
            <tbody>";
            
            while($fila = mysqli_fetch_array($queryb)){
                $salida.="
                <tr>
                    <th><img src='../img/productos/producto.png' width='75px' alt=''></th>
                    <td>".$fila['ID_PRODUCTO']."</td>
                    <td><h4 style='font-size: 14pt'>".$fila['PRODUCTO']."</h4></td>
                    <td>".$fila['UM']."</td>
                    <td><h4 style='font-size: 14pt'>".$fila['DESCRIPCION']."</h4></td>
                    <td><h1 style='font-size: 14pt;' class='precio'>Q. <span>".$fila['PRC_VENTA']."</span></h1></td>
                    <td>".$fila['MARCA']."</td>
                    <td><a href='' class='btn btn-block btn-primary agregar-carrito' data-id=".$fila['ID_PRODUCTO'].">Agregar</a></td>
                </tr>";
            }
            $salida.="</tbody></table>";

}else{
    $salida.="Ningun dato";

}

echo $salida;
?>