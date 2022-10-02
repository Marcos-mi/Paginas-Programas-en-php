<?php
include_once "config.php";
include_once "entidades/producto.php";
include_once "entidades/tipo_producto.php";

$producto = new Producto();
if($_POST){
    if(isset($_POST["btnGuardar2"])){
        $producto -> cargarFormulario($_REQUEST);

     if(isset($_GET["id"]) && $_GET["id"] > 0){
        $producto -> actualizar();
        $msg["texto"] = "Actualizado correctamente";
        $msg["codigo"] = "alert-success";

    }else{
        $producto -> insertar();
        $msg["texto"] = "Insertado correctamente";
        $msg["codigo"] = "alert-success";
    }
    } else if (isset($_POST["btnBorrar"])){
        $producto -> cargarFormulario($_REQUEST);
        $producto -> eliminar();
        header("Location: producto-listado.php");
    }
}

if(isset($_GET["id"]) && $_GET["id"] > 0){
    $producto -> cargarFormulario($_REQUEST);
    $producto -> obtenerPorId();
}

$tipoProducto = new tipoProducto();
$aTipoProductos = $tipoProducto ->  obtenerTodos();
include_once "header.php"; 
?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Productos</h1>
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
            <a href="producto-listado.php" class="btn btn-primary mr-2">Listado</a>
            <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar2">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
      </div>
  </div>
  <div class="row">
      <div class="col-6 form-group">
          <label for="txtNombre">Nombre:</label>
          <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $producto -> nombre; ?>">
      </div>
      <div class="col-6 form-group">
                    <label for="txtTipoProducto">Tipo de producto:</label>
                    <select name="lstTipoProducto" id="lstTipoProducto" class="form-control selectpicker" data-live-search="true" required>
                        <option value="" disabled selected>Seleccionar</option>
                        <?php foreach($aTipoProductos as $tipoProducto):?>
                        <?php  if($producto-> fk_idtipoproducto == $tipoProducto -> idtipoproducto):     ?>
                                <option selected value="<?php  $tipoProducto -> idtipoproducto; ?>"><?php echo $tipoProducto -> nombre;?></option>
                            <?php else: ?>
                                <option  value="<?php  $tipoProducto -> idtipoproducto; ?>"><?php echo $tipoProducto -> nombre;?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                    </select>
        </div>
        <div class="col-6 form-group">
          <label for="txtCantidad">Cantidad</label>
          <input type="number" required class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $producto->cantidad; ?>">
      </div>
        <div class="col-6 form-group">
          <label for="txtPrecio">Precio</label>
          <input type="number" placeholder="0" required class="form-control" name="txtPrecio" id="txtPrecio" value="<?php echo $producto -> precio; ?>">
      </div>
    </div>
    <div col-12>
        <label for="">Descripcion</label>
        <textarea name="textDescripcion" id="txtDescripcion" cols="30" rows="10"><?php  echo $producto -> descripcion; ?></textarea>
    </div>
    <div class="col-6 form-group">
        <label for="fileImagen">Imagen:</label>
        <input type="file" class="form-control-file" name="archivo" id="imagen">
        <img src="files/" class="img-thumbnail">        
    </div>











    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
    .create ( document.querySelector ( ' #txtDescripcion ' ) )
    .catch ( error => {
    console.error (error);
    } );
    </script>