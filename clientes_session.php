<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);


$eliminarCompleto = "";
session_start();
if(isset($_SESSION["listadoClientes"])){
    //si existe la variable de session listadoClientes asigno su contenido en aCliente
    $aClientes = $_SESSION["listadoClientes"];
}else{
    $aClientes = array();
}
//creamos variables para los datos que vienen del formulario
if($_POST){
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];
    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];

    //array asociativo que contiene los clientes
    $aClientes[] = array ( "nombre" => $nombre,
                            "dni" => $dni,
                            "telefono" => $telefono,
                            "edad" => $edad,
                        );
    //actualiza el contenido de la variable de session
    $_SESSION["listadoClientes"]= $aClientes;

    if(isset($_POST["btnEliminar"]) ){
        session_destroy();
        $aClientes = array ();
    }
}
if(isset($_GET["pos"])){
     //Recupero el dato que viene desde la query string vía get
    $pos = $_GET["pos"];
    //Elimina la posición del array indicada
    unset($aClientes[$pos]);
    //actualiza la variable de session con el array actualizado
    $_SESSION["listadoClientes"] = $aClientes;
    header("Location: clientes_session.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a9448b5173.js" crossorigin="anonymous"></script>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de clientes</h1>
            </div>
            <div class="row">
                <div class="col-4">
                    <form action="" method="post">
                    <div class="pb-3">
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtDni">DNI:</label>
                        <input type="number" name="txtDni" id="txtDni" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Telefono:</label>
                        <input type="number" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div class="pb-3">
                    <div class="pb-3">
                        <label for="txtEdad">Edad:</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control" >
                    </div>
                    <div>
                        <button type="submit"  name="btnEnviar" id="btnEnviar" class="btn btn-primary">Enviar</button>
                        <button type="submit"  name="btnEliminar" id="btnEliminar" class="btn btn-danger">Eliminar</button>
                    </div>
                    </form>
                </div>
                <div class="col-8">
                    <table class="table table-hover border">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Telefono</th>
                                <th>Edad</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($aClientes as $pos => $cliente) : ?>
                            <tr>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["telefono"]; ?></td>
                                <td><?php echo $cliente["edad"]; ?></td>
                                <td><a href="clientes_session.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash"></i></a></td>                            </tr>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>