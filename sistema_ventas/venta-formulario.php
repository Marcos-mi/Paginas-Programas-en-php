<?php
include_once "config.php";
include_once "entidades/cliente.php";
include_once "entidades/producto.php";
include_once "entidades/venta.php";



$venta = new Venta();
if($_POST){
    if(isset($_POST["btnGuardar"])){
        $venta -> cargarFormulario($_REQUEST);

     if(isset($_GET["id"]) && $_GET["id"] > 0){
        $venta -> actualizar();
        $msg["texto"] = "Actualizado correctamente";
        $msg["codigo"] = "alert-success";

    }else{
        $venta -> insertar();
        $msg["texto"] = "Insertado correctamente";
        $msg["codigo"] = "alert-success";
    }
    } else if (isset($_POST["btnBorrar"])){
        $venta -> cargarFormulario($_REQUEST);
        $venta -> eliminar();
        header("Location: venta-listado.php");
    }
}

if(isset($_GET["id"]) && $_GET["id"] > 0){
    $venta -> cargarFormulario($_REQUEST);
    $venta -> obtenerPorId();
}


$producto = new Producto();
$aProductos = $producto->obtenerTodos();

$cliente = new Cliente();
$aClientes = $cliente->obtenerTodos();



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
            <a href="venta-listado.php" class="btn btn-primary mr-2">Listado</a>
            <a href="venta-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
      </div>
  </div>
  <div class="row">
                <div class="col-12 form-group">
                    <label for="txtFechaNac" class="d-block">Fecha y hora:</label>
                    <select class="form-control d-inline" name="txtDia" id="txtDia" style="width: 80px">
                        <option selected="" disabled="">DD</option>
                        <?php for($i=1; $i<=31; $i++): ?>
                            <?php if(date("d") == $i): ?>
                                <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </select>
                    <select class="form-control d-inline" name="txtMes" id="txtMes" style="width: 80px">
                        <option selected="" disabled="">MM</option>
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <?php if (date("m") == $i): ?>
                                <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endif;?>
                        <?php endfor;?>
                    </select>
                    <select class="form-control d-inline" name="txtAnio" id="txtAnio" style="width: 100px">
                        <option selected="" disabled="">YYYY</option>
                        <?php for ($i = 2020 ; $i <= date("Y"); $i++): ?>
                            <?php if (date("Y") == $i): ?>
                                <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endif;?>
                        <?php endfor;?>
                    </select>
                    <input type="time" required="" class="form-control d-inline" style="width: 120px" name="txtHora" id="txtHora" value="<?php echo date("H:i");?>">
                  
                </div>

  <div class="row">
      <div class="col-6 form-group">
          <label for="txtCliente">Cliente</label>
          <select name="lstCliente" id="lstCliente" class="form-control selectpicker" data-live-search="true" required>
              <option value="" disabled selected>Seleccionar</option>
              <?php foreach($aClientes as $cliente): ?>
                            <?php if($venta->fk_idcliente == $cliente->idcliente): ?>
                                <option selected value="<?php echo $cliente->idcliente;?>"><?php echo $cliente->nombre; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $cliente->idcliente;?>"><?php echo $cliente->nombre; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
          </select>
      </div>
      <div class="col-6 form-group">
          <label for="txtProducto">Producto</label>
          <select name="lstProducto" id="lstProducto" class="form-control selectpicker" data-live-search="true" required>
              <option value="" disabled selected>Seleccionar</option>
              <?php foreach($aProductos as $producto): ?>
                            <?php if($venta->fk_idproducto == $producto->idproducto): ?>
                                <option selected value="<?php echo $producto->idtipoproducto;?>"><?php echo $producto->nombre; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $producto->idproducto;?>"><?php echo $producto->nombre; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
          </select>
      </div>
        <div class="col-6 form-group">
          <label for="txtPrecioUnitario">Precio unitario</label>
          <input type="number" placeholder="0" required class="form-control" name="txtPrecioUnitario" id="txtPrecioUnitario" value="<?php echo $venta -> preciounitario; ?>">
      </div>
        <div class="col-6 form-group">
          <label for="txtCantidad">Cantidad</label>
          <input type="number" placeholder="0" required class="form-control" name="txtCantidad" id="txtCantidad" value=" <?php echo $venta -> cantidad;  ?>">
      </div>
        <div class="col-6 form-group">
          <label for="txtTotal">Total</label>
          <input type="number" placeholder="0" required class="form-control" name="txtTotal" id="txtTotal" value="<?php echo $venta -> total;  ?>">
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