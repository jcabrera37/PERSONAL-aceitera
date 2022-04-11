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
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>PRODUCTO</td>
                    <td>UM</td>
                    <td>DESCRIPCION</td>
                    <td>PRECIO</td>
                    <td>MARCA</td>
                </tr>
            </thead>
            <tbody>";
            
            while($fila = mysqli_fetch_array($queryb)){
                $salida.="
                <tr>
                    <td>".$fila['ID_PRODUCTO']."</td>
                    <td>".$fila['PRODUCTO']."</td>
                    <td>".$fila['UM']."</td>
                    <td>".$fila['DESCRIPCION']."</td>
                    <td>".$fila['PRC_VENTA']."</td>
                    <td>".$fila['MARCA']."</td>
                </tr>";
            }
            $salida.="</tbody></table>";

}else{
    $salida.="Ningun dato";

}

echo $salida;
?>