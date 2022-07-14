<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

    function contar($aArray){
        $contador = 0;
        foreach($aArray as $item){
            $contador++;
        }
        return $contador;
    }




$aNotas= array(9,8,9.50,4,7,8);
$aPacientes=array();

 
$aPacientes[]=array(
    "dni"=> "33.765.012",
    "nombre"=> "Ana Acuña",
    "edad"=> 45,
    "peso"=> 81.50
);
$aPacientes[]=array(
    "dni"=> "23.684.385",
    "nombre"=> "Gonzalo bustamante",
    "edad"=> 66,
    "peso"=>79
);
$aPacientes[]=array(
    "dni"=> "23.684.385",
   "nombre"=> "Juan Irraola",
   "edad"=> 28,
   "peso"=> 79
);
$aPacientes[]=array(
    "dni"=> "23.684.395",
    "nombre"=> "Beatriz ocampo",
    "edad"=> 50,
    "peso"=> 79
);

$aProductos = array();
$aProductos[] = array("nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000
);
$aProductos[] = array("nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000
);
$aProductos[] = array("nombre" => "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000
);

echo "cantidad de pacientes " , contar($aPacientes) . "<br>";
echo "cantidad de productos " , contar($aProductos) . "<br>";
echo "cantidad de notas " , contar($aNotas);
?>
