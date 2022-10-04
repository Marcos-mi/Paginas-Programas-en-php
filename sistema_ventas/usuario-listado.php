<?php
include_once "config.php";
include_once "entidades/usuario.php";
include_once("header.php"); 


$usuarios = new Usuario();
$aUsuarios  = $usuarios -> obtenerTodos();


?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Listado de usuarios</h1>
<?php if(isset($msg)): ?>
  <div class="row">
      <div class="col-12">
          <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
              <?php echo $msg["texto"]; ?>
          </div>
      </div>
  </div>
  <?php endif; ?>
  <div class="row">
      <div class="col-12 mb-3">
        <a href="usuario-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
      </div>
  </div>
  <div class="row">
     <table class="table table:hover ">
        <thead>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Acciones</th>
        </thead>
        <tbody>
          <?php foreach($aUsuarios as $usuario) : ?>
          <tr>
              <td><?php echo $usuario -> usuario; ?></td>
              <td><?php echo $usuario -> nombre; ?></td>
              <td><?php echo $usuario -> apellido; ?></td>
              <td><?php echo $usuario -> correo; ?></td>
              <td> <a href="usuario-formulario.php?id=<?php echo $usuario -> idusuario; ?> " ><i class="fas fa-search"></i></a></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
     </table>
    </div>