<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

if($_POST){
    $titulo = $_POST["txtTitulo"];
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuario"];
    $estado = $_POST["lstEstado"];
    $descripcion = $_POST["txtDescripcion"];

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
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
                    <h1>Gestor de tareas</h1>
            </div>
        </div>
        <div class="row pb-3">
            <div>
                <form action="" method="post">
                    <div class="row">
                        <div class="py-1 col-4">
                            <label for="lstPrioridad">Prioridad</label>
                            <select name="lstPrioridad" id="lstPrioridad" class="form-control" required>
                                <option value="" disabled selected>Seleccionar</option>
                                <option>Alta</option>
                                <option>Media</option>
                                <option >Baja</option>
                            </select>
                        </div>
                        <div class="py-1 col-4">
                            <label for="lstUsuario">Usuario</label>
                            <select name="lstUsuario" id="lstUsuario" class="form-control" required>
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Ana" >Ana</option>
                                <option value="Bernabe">Bernabe</option>
                                <option value="Daniela">Daniela</option>
                            </select>
                        </div>
                        <div class="py-1 col-4">
                            <label for="lstEstado">Estado</label>
                            <select name="lstEstado" id="lstEstado" class="form-control" required>
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Sin asignar">Sin asignar</option>
                                <option value="Asignado">Asignado</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Terminado">Terminado</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-1">
                            <label for="txtTitulo">Título</label>
                            <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" required value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-1">
                            <label for="txtDescripcion">Descripción</label>
                            <textarea name="txtDescripcion" id="txtDescripcion" required class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-1 text-center">
                            <button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary">ENVIAR</button>
                             <a href="index.php" class="btn btn-secondary">CANCELAR</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pt-3">
                <table class="table table-hover border">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de inserción</th>
                        <th>Título</th>
                        <th>Prioridad</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td><?php ?></td>
                            <td><?php ?></td>
                            <td><?php  ?></td>
                            <td><?php  ?></td>
                            <td><?php  ?></td>
                            <td><?php  ?></td>
                            <td>
                                <a href="?id=<?php echo $pos ?>&do=editar" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
                                <a href="?id=<?php echo $pos ?>&do=eliminar" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
           
    </main>
</body>
</html>