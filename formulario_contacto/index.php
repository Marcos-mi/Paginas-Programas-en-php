<?php
    ini_set("display_errors", 1);
    ini_set("display_startup_errors",1);
    error_reporting(E_ALL);
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
<main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Formulario de datos de personas</h1>
            </div>
        </div> 
      
        <div class="row">
            <div class="col-6">
                <form action="resultado.php" method="post">
                    <div class="pb-3">
                        <label for="txtUsuario">Nombre:*</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" required class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtDni">DNI:*</label>
                        <input type="number" name="txtDni" id="txtDni" required class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Telefono:*</label>
                        <input type="number" name="txtTelefono" id="txtTelefono" required class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtEdad">Edad:*</label>
                        <input type="number" name="txtEdad" id="txtEdad" required class="form-control">
                    </div>
                    <div>
                        <button type="submit"  name="btnEnviar" id="btnEnviar" class="btn btn-primary float-end">Enviar</button>
                    </div>
            </div>                 
                </form>
            </div>
        </div>  
    </main>
</body>
</html>