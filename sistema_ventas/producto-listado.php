<?php
include_once "config.php";

include_once("header.php"); 




?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Listado  de productos</h1>
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
        <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
      </div>
  </div>
  <div class="row">
     <table class="table table:hover ">
        <thead>
            <th>Foto</th>
            <th>Nombre</th></th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>
        </thead>
        <tbody>

        </tbody>
     </table>
    </div>