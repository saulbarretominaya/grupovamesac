 <div class="modal-header">
     <h4 class="modal-title">CARGA INICIAL</h4>
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
                                         <label class="col-md-4">FECHA CARGA INICIAL</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->fecha_carga_inicial; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">TIPO INGRESO</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->ds_tipo_ingreso; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">MONEDA</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->ds_moneda; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">TIPO CAMBIO</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->tipo_cambio; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">CLIENTE/PROVEEDOR </label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->ds_nombre_cliente_proveedor; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">TIPO COMBROBANTE</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->ds_tipo_comprobante; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">FECHA COMPROBANTE </label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->fecha_comprobante; ?>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-5">
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">N COMPROBAN</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->num_comprobante; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">N GUIA</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->num_guia; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">N ORDEN COMPRA</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->num_orden_compra; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">OBSERVACION</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->observacion; ?>
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
                     <h3 class="card-title">Detalle</h3>
                 </div> -->
                 <form class="form-horizontal">
                     <div class="card-body" style="overflow-x:auto;">
                         <table>
                             <thead>
                                 <tr style="background-color:#B0B0B0">
                                     <th>Item</th>
                                     <th>Almacen</th>
                                     <th>Codigo</th>
                                     <th>Descripcion</th>
                                     <th>U.M.</th>
                                     <th>Marca</th>
                                     <th>Stock Actual.</th>
                                     <th>Nueva Cant.</th>
                                     <th>Total Stock</th>
                                     <th>Precio Unitario</th>
                                     <th>Valor Total</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    foreach ($index_modal_detalle as $index_modal_detalle) : ?>
                                     <tr>
                                         <td><?php echo $index_modal_detalle->item; ?></td>
                                         <td><?php echo $index_modal_detalle->ds_almacen; ?></td>
                                         <td><?php echo $index_modal_detalle->codigo_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->descripcion_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->ds_unidad_medida; ?></td>
                                         <td><?php echo $index_modal_detalle->ds_marca_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->stock_actual; ?></td>
                                         <td><?php echo $index_modal_detalle->nueva_cantidad; ?></td>
                                         <td><?php echo $index_modal_detalle->total_stock; ?></td>
                                         <td><?php echo $index_modal_detalle->precio_unitario; ?></td>
                                         <td><?php echo $index_modal_detalle->valor_total; ?></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                             <tfoot>
                                 <tfoot>
                                     <tr>
                                         <td colspan="10" class="text-right"><strong>MONTO TOTAL <i class="mdi mdi-video-input-antenna:"></i></strong></td>
                                         <td> <?php echo $index_modal_cabecera->monto_total; ?></td>
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