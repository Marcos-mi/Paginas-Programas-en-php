<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

//Preguntar si existe el archivo
    if(file_exists("archivo.txt")){

        //vamos a leerlo y almacenar el contenido en jsonClientes
        $jsonClientes = file_get_contents("archivo.txt");

        //convertir jsonclientes a array aClientes
        $aClientes =  json_decode($jsonClientes, true);
    }else{
        //creamos un aClientes inicializado como array vació
        $aClientes= array();
    }


    
    $pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";
    if($_POST){
        $documento = trim($_POST["txtDocumento"]);
        $nombre = trim($_POST["txtNombre"]);
        $telefono = trim($_POST["txtTelefono"]);
        $correo = trim($_POST["txtCorreo"]);
        $nombreImagen = "";
        
        if($pos>=0){
            if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
                $nombreAleatorio = date("Ymdhmsi"); //2021010420453710
                $archivo_tmp = $_FILES["archivo"]["tmp_name"];
                $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
                if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                    $nombreImagen = "$nombreAleatorio.$extension";
                    move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
                }
                //Eliminar la imagen anterior
                if($aClientes[$pos]["imagen"] != "" && file_exists("imagenes/".$aClientes[$pos]["imagen"])){
                    unlink("imagenes/".$aClientes[$pos]["imagen"]);
                } 
            } else {
                //Mantener el nombreImagen que teniamos antes
                $nombreImagen = $aClientes[$pos]["imagen"];
            }
            //Actualizar
            $aClientes[$pos] = array("documento" => $documento,
                                "nombre" => $nombre,
                                "telefono" => $telefono,
                                "correo" => $correo,
                                "imagen" => $nombreImagen);
    
        } else {
            if($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){
                $nombreAleatorio = date("Ymdhmsi"); //2021010420453710
                $archivo_tmp = $_FILES["archivo"]["tmp_name"];
                $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
                if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
                    $nombreImagen = "$nombreAleatorio.$extension";
                    move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
                }
            }
            //Insertar
            $aClientes[] = array("documento" => $documento,
                                "nombre" => $nombre,
                                "telefono" => $telefono,
                                "correo" => $correo,
                                "imagen" => $nombreImagen);
        }
    
        //Convertir el array de clientes a jsonClientes
        $jsonClientes = json_encode($aClientes);
    
        //Almacenar el string jsonClientes en el "archivo.txt"
        file_put_contents("archivo.txt", $jsonClientes);
    
    }
    
    if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
       //Eliminar del array aClientes la posición a borrar unset()
        unset($aClientes[$pos]);
    
        //Convertir el array de clientes a jsonClientes
        $jsonClientes = json_encode($aClientes);
    
        //Almacenar el string jsonClientes en el "archivo.txt"
        file_put_contents("archivo.txt", $jsonClientes);
    
        header("Location: index.php");
    }






?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                    <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="pb-3">
                        <label for="txtDni">Dni:*</label>
                        <input type="text" name="txtDocumento" id="txtDocumento" class="form-control shadow" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["documento"]: ""; ?>">
                    </div>
                    <div class="pb-3">
                        <label for="txtNombre">Nombre:*</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control shadow" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["nombre"]: "";  ?>">
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Telefono:*</label>
                        <input type="number" name="txtTelefono" id="txtTelefono" class="form-control shadow" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["telefono"]: "";   ?>">
                    </div>
                    <div class="pb-3">
                        <label for="txtCorreo">Correo:*</label>
                        <input type="email" name="txtCorreo" id="txtCorreo" class="form-control shadow" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["correo"]: "";  ?>">
                    </div>
                    <div class="pb-3">
                        <label for="">Archivo adjunto</label>
                        <input class="form-control"type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <small class="shadow">Archivos admitidos: .png, .jpeg, .jpg</small>
                    </div>
                    <div>
                        <button type="submit" name="btnGuardar" id="btnGuardar" class="bg-primary btn text-white px-3 mx-2">Guardar</button>
                        <a href="index.php" class="btn px-3 btn-danger my-2">Nuevo</a>
                    </div>
                </form> 
            </div>
            <div class="col-sm-8">
                <div class="table-responsive">
                    <table class="table border table-striped table-hover table-sm my-3 shadow">
                        <thead class="bg-secondary bg-gradient text-white">
                            <th>Imagen</th>
                            <th>Dni</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            <?php foreach($aClientes as $pos => $cliente) :?>
                            <tr>
                                <td><img src="imagenes/<?php echo $cliente["imagen"];?>" class="img-thumbnail"></td>
                                <td><?php echo $cliente["documento"]; ?></td>
                                <td><?php echo $cliente["nombre"]  ?></td>
                                <td><?php echo $cliente["correo"]  ?></td>
                                <td> <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                            <?php endforeach;   ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>