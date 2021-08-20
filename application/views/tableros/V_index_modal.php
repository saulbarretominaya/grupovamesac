 <div class="modal-header">
     <h5 class="modal-title">Tableros</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
 </div>
 <div class="modal-body">
     <div class="row">
         <div class="col-md-3">
             <div class="input-group">
                 <!-- <img src="" alt="Cinque Terre" /> -->
                 <!-- <img src="<?php echo base_url() ?>plantilla/dist/img/user3-128x128.jpg"> -->
             </div>
         </div>
         <div class="col-md-6">
             <div class="col-md-12">
                 <center><b>GRUPO VAME SAC</b>
                     <h6>Av. Proceres 316 Int.2 Urb.Condevilla Señor - San Martin de Porres - Lima - Lima <br>
                         Telefonos: (01) 496 88 31 / 960 430 277<br>
                         Email: contabilidad@vamesac.pe<br>
                 </center>
                 <!-- Tienda: Av.Pacasmayo 403 - Pabellon I - Puesto 7 C.C
                     Página web:<a href="#"> grupovamesac.com</a></h6> -->
             </div>
         </div>
         <div class="col-md-3">
             <div class="col-md-10">
                 <center>
                     <p style="border-style: inset;">
                         <b>TABLERO<br>
                             RUC: 20600862481<br>
                             TAB-00001</b>
                     </p>
                 </center>
             </div>
         </div>
     </div>
     <!-- style=" border-style: groove;" -->

     <!-- /.box-header -->
     <div class="row">

         <!--IZQUIERDA-->
         <div class="col-md-6">
             <!-- Primer Card -->
             <div class="card card-success">
                 <!-- <div class="card-header">
                     <h3 class="card-title">Aplicar Ganancia</h3>
                 </div> -->
                 <div class="card-body">
                     <!-- Primera Fila -->
                     <div class="form-row">
                         <div class="col-md-3">
                             <label for="">Codigo Tablero</label>
                         </div>
                         <div class="col-md-7">
                             <?php echo $cabecera_modal->codigo_tablero; ?>
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="col-md-3">
                             <label for="">Marca Tablero</label>
                         </div>
                         <div class="col-md-7">
                             <?php echo $cabecera_modal->ds_marca_tablero; ?>
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="col-md-3">
                             <label for="">Modelo Tablero</label>
                         </div>
                         <div class="col-md-7">
                             <?php echo $cabecera_modal->ds_modelo_tablero; ?>
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="col-md-3">
                             <label for="">Tipo Moneda</label>
                         </div>
                         <div class="col-md-7">
                             <?php echo $cabecera_modal->ds_moneda; ?>
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="col-md-3">
                             <label for="">Almacen</label>
                         </div>
                         <div class="col-md-7">
                             <?php echo $cabecera_modal->ds_almacen; ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!--DERECHA-->
         <div class="col-md-6">
             <!-- Primer Card -->
             <div class="card card-danger">
                 <!-- <div class="card-header">
                     <h3 class="card-title">Aplicar Descuento</h3>
                 </div> -->
                 <div class="card-body">
                     <!-- Primera Fila -->
                     <div class="form-row">
                         <div class="col-md-4">
                             <label for="">Descripcion Tablero</label>
                         </div>
                         <div class="col-md-8">
                             <textarea class="form-control" id="descripcion_tablero" rows="6" readonly><?php echo $cabecera_modal->descripcion_tablero; ?>
                             </textarea>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Detalle -->
         <div class="col-md-12">
             <!-- Horizontal Form -->
             <div class="card card-warning">
                 <div class="card-header">
                     <h3 class="card-title">Detalle Tablero</h3>
                 </div>
                 <!-- /.card-header -->
                 <!-- form start -->
                 <form class="form-horizontal">
                     <div class="card-body">
                         <table class="table-sm table-hover table-responsive">
                             <thead>
                                 <tr>
                                     <th>Item</th>
                                     <th>Almacen</th>
                                     <th>Codigo Producto</th>
                                     <th>Nombre Producto</th>
                                     <th>Unid Medida</th>
                                     <th>Marca</th>
                                     <th>Cantidad</th>
                                     <th>Precio Unitario</th>
                                     <th></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php if (!empty($detalle_modal)) : ?>
                                     <?php foreach ($detalle_modal as $detalle_modal) : ?>
                                         <tr>
                                             <td><?php echo "1"; ?></td>
                                             <td><?php echo $detalle_modal->codigo_producto; ?></td>
                                             <td><?php echo $detalle_modal->descripcion_producto; ?></td>
                                             <td><?php echo $detalle_modal->ds_almacen; ?></td>
                                             <td><?php echo $detalle_modal->ds_unidad_medida; ?></td>
                                             <td><?php echo $detalle_modal->ds_marca_producto; ?></td>
                                             <td><?php echo $detalle_modal->cantidad; ?></td>
                                             <td></td>
                                         </tr>
                                     <?php endforeach; ?>
                                 <?php endif; ?>
                             </tbody>

                         </table>
                     </div>
                     <!-- /.card-body -->
                 </form>
             </div>
             <!-- /.card -->

         </div>

     </div>
     <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         <!-- <button type="button" class="btn btn-primary">Save changes</button> -->