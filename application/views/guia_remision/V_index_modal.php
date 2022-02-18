 <div class="modal-header">
     <h4 class="modal-title">Guia Remision</h4>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
 </div>
 <div class="modal-body">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="col-md-12">
                     <div class="form-group row">
                         <div class="col-md-8">
                             <div class="form-group row">
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-3">FECHA EMISION GUIA</label>
                                         <div class="col-md-9">
                                             21/10/2021
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-3">CONDICION PAGO</label>
                                         <div class="col-md-9">
                                             EFECTIVO
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-3">FECHA VENCIMIENTO</label>
                                         <div class="col-md-9">
                                             21/10/2021
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-3">CLIENTE</label>
                                         <div class="col-md-9">
                                             JULIAN PACHECO JENNIFER SOLANGE
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-3">DIRECCION</label>
                                         <div class="col-md-9">

                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-3">RUC</label>
                                         <div class="col-md-9">
                                             45267674
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-3">OBSERVACION</label>
                                         <div class="col-md-9">
                                             CABLES
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group row">
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">MONEDA</label>
                                         <div class="col-md-7">
                                             SOLES
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">O. COMPRA</label>
                                         <div class="col-md-7">

                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">GUIA</label>
                                         <div class="col-md-7">

                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <center><b>DATOS DEL ASESOR COMERCIAL</b></center>
                                     <div class="input-group">
                                         <label class="col-md-4">NOMBRE</label>
                                         <div class="col-md-7">

                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-4">CELULAR</label>
                                         <div class="col-md-7">

                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-4">CORREO</label>
                                         <div class="col-md-7">

                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="col-md-12">
             <div class="card">
                 <!-- <div class="card-header">
                     <h3 class="card-title">Detalle Tablero</h3>
                 </div> -->
                 <form class="form-horizontal">
                     <div class="card-body" style="overflow-x:auto;">
                         <table>
                             <thead>
                                 <tr style="background-color: gray;">
                                     <th>Item</th>
                                     <th>Cantidad</th>
                                     <th>Codigo</th>
                                     <th>Descripcion</th>
                                     <th>Marca</th>
                                     <th>U.M.</th>
                                     <th>Precio U</th>
                                     <th>Dscto %</th>
                                     <th>Precio U/D</th>
                                     <th>Valor Total</th>
                                     <th>Dias Entrega</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $variable_agrupamiento = "RSBM"; ?>
                                 <?php foreach ($detalle_modal as $detalle_modal) : ?>
                                     <?php if ($detalle_modal->id_tablero != '0') { ?>
                                         <tr>
                                             <?php if ($detalle_modal->id_tablero != $variable_agrupamiento) { ?>
                                                 <th></th>
                                                 <th><?php echo $detalle_modal->cantidad_tablero; ?></th>
                                                 <th><?php echo $detalle_modal->codigo_tablero; ?></th>
                                                 <th><?php echo $detalle_modal->descripcion_tablero; ?></th>
                                                 <th><?php echo $detalle_modal->ds_marca_tablero; ?></th>
                                                 <th></th>
                                                 <th><?php echo $detalle_modal->precio_ganancia; ?></th>
                                                 <th><?php echo $detalle_modal->d_tablero; ?></th>
                                                 <th><?php echo $detalle_modal->precio_descuento_tablero; ?></th>
                                                 <th><?php echo $detalle_modal->valor_venta_tablero; ?></th>
                                                 <th><?php echo $detalle_modal->dias_entrega_tablero; ?></th>
                                             <?php $variable_agrupamiento = $detalle_modal->id_tablero;
                                                } ?>
                                         </tr>
                                     <?php } ?>
                                     <tr>
                                         <td></td>
                                         <td><?php echo $detalle_modal->cantidad_producto; ?></td>
                                         <td><?php echo $detalle_modal->codigo_producto; ?></td>
                                         <td><?php echo $detalle_modal->descripcion_producto; ?></td>
                                         <td><?php echo $detalle_modal->ds_marca_producto; ?></td>
                                         <td><?php echo $detalle_modal->ds_unidad_medida; ?></td>
                                         <td><?php echo $detalle_modal->precio_unitario; ?></td>
                                         <td><?php echo $detalle_modal->d_producto; ?></td>
                                         <td><?php echo $detalle_modal->precio_descuento; ?></td>
                                         <td><?php echo $detalle_modal->valor_venta; ?></td>
                                         <td><?php echo $detalle_modal->dias_entrega; ?></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                 </form>
             </div>
         </div>

     </div>
 </div>

 <div class=" modal-footer justify-content-between">
     <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-exit"> Cerrar</span></button>
     <a href="<?php echo base_url(); ?>C_reportes/cotizacion_id" class="btn btn-primary" download=""><span class="fa fa-print"></span> Descargar</a>
 </div>
 </div>