<?php 
    ini_set("display_errors", 1);
    ini_set("display_startup_errors",1);
    error_reporting(E_ALL);

    function calcularAreaRec($base, $altura){
        return $base * $altura;
    }
    echo "El area es " . calcularAreaRec(100, 0.60)."<br>";
    echo "El area es " . calcularAreaRec(800, 300);

?>