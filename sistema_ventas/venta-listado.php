<?php
include_once "config.php";
include_once "entidades/cliente.php";
include_once "entidades/producto.php";
include_once "entidades/venta.php";



$venta = new Venta();
$aVentas = $venta->obtenerTodos();



$producto = new Producto();
$aProductos = $producto->obtenerTodos();

$cliente = new Cliente();
$aClientes = $cliente->obtenerTodos();

include_once("header.php"); 
?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Listado de ventas</h1>
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
        <a href="venta-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
      </div>
  </div>
  <div class="row">
     <table class="table table:hover ">
        <thead>
            <th>Fecha</th>
            <th>Cantidad</th>
            <th>Producto</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>Acciones</th>
        </thead>
        <tbody>
          <?php foreach($aVentas as $venta) :  ?>
          <tr>
              <td><?php echo $venta -> fecha;   ?></td>
              <td><?php echo $venta -> cantidad; ?></td>
              <td><a href="producto-formulario.php?id=<?php echo $venta->fk_idproducto; ?>"><?php echo $venta->nombre_producto; ?></a></td>
              <td><a href="cliente-formulario.php?id=<?php echo $venta->fk_idcliente; ?>"><?php echo $venta->nombre_cliente; ?></a></td>
              <td><?php echo $venta -> total; ?></td>
                <td> <a href="venta-formulario.php?id=<?php echo $venta -> idventa; ?> " ><i class="fas fa-search"></i></a></td>
              </tr>
              <?php endforeach;   ?>
        </tbody>
     </table>
    </div>











 