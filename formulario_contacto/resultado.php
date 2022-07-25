<?php
    ini_set("display_errors", 1);
    ini_set("display_startup_errors",1);
    error_reporting(E_ALL);

    if($_POST){

        $nombre = $_POST["txtUsuario"];
        $dni = $_POST["txtDni"];
        $tel = $_POST["txtTelefono"];
        $edad = $_POST["txtEdad"];
        
        
    }



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
<main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Resultado de formulario</h1>
            </div>
        </div> 
      
        <div class="row">
            <div class="col-12">
                <table class="table border ">
                    <thead>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Edad</th>
                    </thead>
                    <tbody>
                        <tr>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $dni; ?></td>
                        <td><?php echo $tel; ?></td>
                        <td><?php echo $edad; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>                 
        </div>        
        <div class="row">
            <div class="col-12 text-center p-3">
                <a href="index.php" class="btn btn-primary ">Volver al formulario</a>
            </div>
        </div>         

    </main>
</body>
</body>
</html>