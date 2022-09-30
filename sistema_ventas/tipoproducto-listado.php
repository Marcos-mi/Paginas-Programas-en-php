<?php
include_once "config.php";
include_once "entidades/tipo_producto.php";
include_once("header.php"); 



$tipoProducto = new tipoProducto();
$aTipoProductos = $tipoProducto ->  obtenerTodos();



?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Listado de tipo de productos</h1>
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
        <a href="tipoproducto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>  
      </div>
  </div>
  <div class="row">
     <table class="table table:hover ">
        <thead>
            <th>Nombre</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php   foreach($aTipoProductos as $tipoProducto) : ?>
                <tr> 
                    <td><?php echo $tipoProducto -> nombre;  ?> </td>
                    <td> <a href="tipoproducto-formulario.php?id=<?php echo $tipoProducto -> idtipoproducto; ?> " ><i class="fas fa-search"></i></a></td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
     </table>
    </div>