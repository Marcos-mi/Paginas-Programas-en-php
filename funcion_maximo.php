<?php 

function maximo($aVector){
    $i = 0;
    foreach($aVector as $item){
        if($i < $item){
            $i = $item;
        }
    }
    return $i;
}

    $aSueldo = array(800.30, 400.87, 500.45, 300, 900.70, 100, 900, 1800);
    echo "El sueldo máximo es: " . maximo($aSueldo);
?>