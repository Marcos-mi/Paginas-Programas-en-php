<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);


function print_f($variable){
    if(is_array($variable)){
        $archivo = fopen("datos.txt", "a+");
        //si es un array lo recorro y guardo el contenido en el archivo "datos.txt
        foreach($variable as $item){
            fwrite($archivo, $item . "\n");
        }
        fclose($archivo);
    }else{
        //entonces si es string, guardo el contenido en el archivo "datos.txt"
        file_put_contents("datos.txt", $variable);
    }
    echo "archivo generado";
}

//uso
$aNotas = array(8,5,7,9,10,1,2,6,5,3,2,6);
$msg = "este es un mensaje! Nos estaremos comunicando contigo a la brevedad";
print_f($msg);





?>