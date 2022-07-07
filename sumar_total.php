<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

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

?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado con bucle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 my-5 text-center">
                <h1>Listado de productos</h1>
            </div>
        </div>
    <div class="row">
                <div class="col-12">
                    <table class="table table-hover border">
                        <thead>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            <?php 
                                $subtotal= 0;
                                for($i=0; $i <count($aProductos); $i++) { 

                                ?>
                        <tr>
                            <td><?php echo $aProductos[$i]["nombre"] ?></td>
                            <td><?php echo $aProductos[$i]["marca"] ?></td>
                            <td><?php echo $aProductos[ $i]["modelo"] ?></td>
                            <td><?php echo $aProductos[ $i]["stock"] == 0? "No hay stock":($aProductos[ $i]["stock"]> 10?"Hay stock":"Poco stock"); ?></td>
                            <td>$<?php echo $aProductos[ $i]["precio"] ?></td>
                            <td><button class="btn bg-primary text-white">Comprar</button></td>
                        </tr>
                        <?php  
                            $subtotal += $aProductos[$i]["precio"];
                                }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                        <p>El subtotal es: <?php echo $subtotal ?></p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>