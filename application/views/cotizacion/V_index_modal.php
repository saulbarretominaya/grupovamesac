 <div class="modal-header">
     <h4 class="modal-title">Cotizacion</h4>
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
                         <div class="col-md-7">
                             <div class="form-group row">
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">FECHA EMISION COT</label>
                                         <div class="col-md-8">
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">VALIDEZ OFERTA</label>
                                         <div class="col-md-8">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">FECHA VENCIMIENTO COT</label>
                                         <div class="col-md-8">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">MONEDA</label>
                                         <div class="col-md-8">

                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">CONDICION PAGO</label>
                                         <div class="col-md-8">

                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">CLIENTE</label>
                                         <div class="col-md-8">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">RUC</label>
                                         <div class="col-md-8">

                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">DIRECCION</label>
                                         <div class="col-md-8">

                                         </div>
                                     </div>
                                 </div>

                                 <div class="input-group">
                                     <label class="col-md-4">LUGAR ENTREGA</label>
                                     <div class="col-md-8">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-5">
                             <div class="form-group row">

                                 <div class="col-md-12">

                                     <center><label>DATOS DEL ASESOR COMERCIAL</label></center>
                                     <div class="input-group">
                                         <label class="col-md-3">NOMBRE</label>
                                         <div class="col-md-9">

                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">CELULAR</label>
                                         <div class="col-md-9">

                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">CORREO</label>
                                         <div class="col-md-9">

                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">OBSERV.</label>
                                         <div class="col-md-9">

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
                                 <?php foreach ($index_modal_detalle as $index_modal_detalle) : ?>
                                     <?php if ($index_modal_detalle->id_tablero != '0') { ?>
                                         <tr>
                                             <?php if ($index_modal_detalle->id_tablero != $variable_agrupamiento) { ?>
                                                 <th></th>
                                                 <th><?php echo $index_modal_detalle->cantidad_tablero; ?></th>
                                                 <th><?php echo $index_modal_detalle->codigo_tablero; ?></th>
                                                 <th><?php echo $index_modal_detalle->descripcion_tablero; ?></th>
                                                 <th><?php echo $index_modal_detalle->ds_marca_tablero; ?></th>
                                                 <th></th>
                                                 <th><?php echo $index_modal_detalle->precio_ganancia; ?></th>
                                                 <th><?php echo $index_modal_detalle->d_tablero; ?></th>
                                                 <th><?php echo $index_modal_detalle->precio_descuento_tablero; ?></th>
                                                 <th><?php echo $index_modal_detalle->valor_venta_tablero; ?></th>
                                                 <th><?php echo $index_modal_detalle->dias_entrega_tablero; ?></th>
                                             <?php $variable_agrupamiento = $index_modal_detalle->id_tablero;
                                                } ?>
                                         </tr>
                                     <?php } ?>
                                     <tr>
                                         <td></td>
                                         <td><?php echo $index_modal_detalle->cantidad_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->codigo_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->descripcion_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->ds_marca_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->ds_unidad_medida; ?></td>
                                         <td><?php echo $index_modal_detalle->precio_unitario; ?></td>
                                         <td><?php echo $index_modal_detalle->d_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->precio_descuento; ?></td>
                                         <td><?php echo $index_modal_detalle->valor_venta; ?></td>
                                         <td><?php echo $index_modal_detalle->dias_entrega; ?></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                             <tfoot>
                                 <tfoot>
                                     <tr>
                                         <td colspan="9" class="text-right"><strong>SUB TOTAL</strong></td>
                                         <td>100.00</td>
                                     </tr>
                                     <tr>
                                         <td colspan="9" class="text-right"><strong>SUB TOTAL</strong></td>
                                         <td>100.00</td>
                                     </tr>
                                     <tr>
                                         <td colspan="9" class="text-right"><strong>SUB TOTAL</strong></td>
                                         <td>100.00</td>
                                     </tr>
                                 </tfoot>
                             </tfoot>
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