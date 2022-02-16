 <div class="modal-header">
     <h4 class="modal-title">ORDEN COMPRA</h4>
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
                                         <label class="col-md-4">FECHA EMISION OC</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->fecha_orden_compra; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">FACTURAR A </label>
                                         <div class="col-md-8">
                                             Pendiente por Saul
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">RUC </label>
                                         <div class="col-md-8">
                                             Pendiente por Saul
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">TELEFONO </label>
                                         <div class="col-md-8">
                                             (01)496-88-31
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
                         <div class="col-md-5">
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">PROVEEDOR</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->ds_nombre_cliente_proveedor; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">RUC</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->num_documento; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">TRATADO CON</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->nombre_encargado; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">DIRECCION</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->direccion_fiscal_cliente_proveedor; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">CONDI PAGO</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->ds_condicion_pago; ?>
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
                                     <label class="col-md-4">LUGAR ENT</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->lugar_entrega; ?>
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
                                     <th>Cantidad</th>
                                     <th>Codigo</th>
                                     <th>Descripcion</th>
                                     <th>Marca</th>
                                     <th>U.M.</th>
                                     <th>Precio U</th>
                                     <th>Valor Venta</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    foreach ($index_modal_detalle as $index_modal_detalle) : ?>
                                     <tr>
                                         <td><?php echo $index_modal_detalle->item; ?></td>
                                         <td><?php echo $index_modal_detalle->cantidad; ?></td>
                                         <td><?php echo $index_modal_detalle->codigo_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->descripcion_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->ds_marca_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->ds_unidad_medida; ?></td>
                                         <td><?php echo $index_modal_detalle->precio_unitario_costo; ?></td>
                                         <td><?php echo $index_modal_detalle->total_compra; ?></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                             <tfoot>
                                 <tfoot>
                                     <tr>
                                         <td colspan="7" class="text-right"><strong>VALOR <i class="mdi mdi-video-input-antenna:"></i></strong></td>
                                         <td> <?php echo $index_modal_cabecera->valor_venta; ?></td>
                                     </tr>
                                     <tr>
                                         <td colspan="7" class="text-right"><strong>IGV</strong></td>
                                         <td><?php echo $index_modal_cabecera->igv; ?> </td>
                                     </tr>
                                     <tr>
                                         <td colspan="7" class="text-right"><strong>PRECIO VENTA</strong></td>
                                         <td><?php echo $index_modal_cabecera->precio_venta; ?> </td>
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