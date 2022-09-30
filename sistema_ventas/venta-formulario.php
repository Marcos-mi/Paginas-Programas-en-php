<?php
include_once "config.php";

include_once("header.php"); 




?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Venta</h1>
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
          <a href="cliente-listado.php" class="btn btn-primary mr-2">Listado</a>
          <a href="cliente-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
          <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
          <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
      </div>
  </div>
  <div class="row">
      <div class="col-2">
          <label for="">Fecha y hora:</label>
          <input type="date" name="txtDate" id="txtDate" class="form-control">
      </div>
  </div>
  <div class="row">
      <div class="col-6 form-group">
          <label for="txtCliente">Cliente</label>
          <select name="lstCliente" id="lstCliente" class="form-control selectpicker" data-live-search="true" required>
              <option value="" disabled selected>Seleccionar</option>
          </select>
      </div>
      <div class="col-6 form-group">
          <label for="txtProducto">Producto</label>
          <select name="lstProducto" id="lstProducto" class="form-control selectpicker" data-live-search="true" required>
              <option value="" disabled selected>Seleccionar</option>
          </select>
      </div>
        <div class="col-6 form-group">
          <label for="txtPrecioUnitario">Precio unitario</label>
          <input type="number" placeholder="0" required class="form-control" name="txtPrecioUnitario" id="txtPrecioUnitario" value="">
      </div>
        <div class="col-6 form-group">
          <label for="txtCantidad">Cantidad</label>
          <input type="number" placeholder="0" required class="form-control" name="txtCantidad" id="txtCantidad" value="">
      </div>
        <div class="col-6 form-group">
          <label for="txtTotal">Total</label>
          <input type="number" placeholder="0" required class="form-control" name="txtTotal" id="txtTotal" value="">
      </div>
    </div>
   











    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
    .create ( document.querySelector ( ' #txtDescripcion ' ) )
    .catch ( error => {
    console.error (error);
    } );
    </script>