<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);


function print_f($variable){
    if(is_array($variable)){
        //si es un array lo recorro y guardo el contenido en el archivo "datos.txt
    }else{
        //entonces si es strin, guardo el contenido en el archivo "datos.txt"
        file_put_contents("datos.txt", $variable);
    }
}

//uso
$aNotas = array(8,5,7,9,10);
$msg = "este es un mensaje";
print_f($aNotas);





?>