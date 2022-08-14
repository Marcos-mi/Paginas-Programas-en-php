<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

//si existe el archivo invitados lo abrimos y cargamos en una variable del tipo array
//los dni permitidos
if(file_exists("invitados.txt")){
    $archivo = fopen("invitados.txt", "r");
    $aInvitados = fgetcsv($archivo, 0, ",");
}else{
    //creamos un aClientes inicializado como array vació
    $aInvitados= array();
}
if(isset($_POST["btnInvitado"])){
    $documento = $_POST["txtDocumento"];
    //si el dni ingresado se encuentra en la lista se mostrara un mensaje de bienvenido
    if(in_array($documento, $aInvitados)){
        $mensajeBienvenida = "Bienvenido a la fiest@";
    }else{
    //sino un mensaje que no se encuentra en la lista de invitados
        $mensajeRechazo = "no se encuentra en la lista de invitados";
    }
}
if(isset($_POST["btnVip"])){
    $codigo = $_POST["txtCodigo"];
    //si el codigo es "verde" entonces mostrara su codigo de acceso es ....
   if($codigo == "verde"){
    $mensajeCodigo = "Su codigo de acceso es " .rand(1000,9999);
    //sino ud. no tiene pase VIP.
   }else{
        $mensajeCodigoError = "Ud. no tiene pase VIP";
   }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 m-5">
                <h1>Lista de invitados</h1>
            </div>
        </div>
        <?php  if(isset($mensajeBienvenida)){ ?>
                    <div class="alert alert-success" role="alert">
                        <?php  echo $mensajeBienvenida;  ?>
                    </div>
                    <?php }  ?>
        <?php  if(isset($mensajeRechazo)){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?php  echo $mensajeRechazo;  ?>
                    </div>
                    <?php }  ?>
        <?php  if(isset( $mensajeCodigo)){ ?>
                    <div class="alert alert-success" role="alert">
                        <?php  echo  $mensajeCodigo;  ?>
                    </div>
                    <?php }  ?>
        <?php  if(isset($mensajeCodigoError)){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?php  echo $mensajeCodigoError;  ?>
                    </div>
                    <?php }  ?>
        <div class="row">
            <div class="col-12 pb-3">
                <p>Complete el siguiente formulario<p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 ">
                <form action="" method="post">
                    <div class="pb-3">
                        <label for="txtDocumento">Documento:</label>
                        <input type="number" name="txtDocumento" id="txtDocumento"  class="form-control">
                        <button type="submit" class="btn bg-primary text-white mt-3" name="btnInvitado">Verificar invitado</button>
                    </div>
                    <div>
                        <label for="txtCodigo">Ingrese el codigo secreto del pase VIP:</label>
                        <input type="text" name="txtCodigo" id="txtCodigo" class="form-control">
                        <button type="submit" class="btn bg-primary text-white mt-3" name="btnVip">Verificar código</button>
                    </div>
                </form>
            </div>
        </div>

    </main>
</body>
</html>