<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $baseDatos = "aceitera_bd";


    $conection = @mysqli_connect($servidor,$usuario,$clave,$baseDatos);

    if(!$conection){
        echo "Error al conectarse a la base de datos!";
    }

    $connectionTrans = @mysqli_connect($servidor, $usuario, $clave, $transacBD);
    if(!$connectionTrans){
        echo "Error al conectarse a la base de datos!";
    }else{
        
    }

?>