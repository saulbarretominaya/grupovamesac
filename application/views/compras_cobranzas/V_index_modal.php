 <div class="modal-header">
     <h4 class="modal-title">COMPRAS / COBRANZAS</h4>
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
                                         <label class="col-md-4">FECHA</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->fecha_compra_cobranza; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">TIPO COMPROBANTE</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->ds_tipo_compra_cobranza; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">NUM COMPROBANTE</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->num_comprobante; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">SUCURSAL</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->ds_almacen; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">FECHA EMISION</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->fecha_emision; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">FECHA VENCIMIENTO</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->fecha_vencimiento; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">TIPO</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->ds_tipo_compra_cobranza; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">ESTADO</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->ds_estado_compra_cobranza; ?>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">VENDEDOR</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->ds_nombre_trabajador_creacion_cliente_proveedor; ?>
                                         </div>
                                     </div>
                                 </div>

                             </div>
                         </div>
                         <div class="col-md-5">
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">CLI/PRO</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->ds_nombre_cliente_proveedor; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">RUC / DNI </label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->num_documento; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">CONDICION PAGO</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->ds_condicion_pago; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">MONEDA </label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->ds_moneda; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">SUB-TOTAL </label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->sub_total; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">IGV </label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->igv; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="input-group">
                                     <label class="col-md-4">TOTAL</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->total; ?>
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

         <div class="col-md-3">
             <div class="card">
                 <div class="card-header">
                     <h3 class="card-title">Programacion Pagos</h3>
                 </div>
                 <form class="form-horizontal">
                     <div class="card-body" style="overflow-x:auto;">
                         <table>
                             <thead>
                                 <tr style="background-color:#B0B0B0">
                                     <th>Fecha</th>
                                     <th>Monto</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    foreach ($index_modal_detalle_programacion_pagos as $index_modal_detalle_programacion_pagos) : ?>
                                     <tr>
                                         <td><?php echo $index_modal_detalle_programacion_pagos->fecha_cuota; ?></td>
                                         <td><?php echo $index_modal_detalle_programacion_pagos->monto_cuota; ?></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                 </form>
             </div>
         </div>

         <div class="col-md-9">
             <div class="card">
                 <div class="card-header">
                     <h3 class="card-title">Detalle Pago</h3>
                 </div>
                 <form class="form-horizontal">
                     <div class="card-body" style="overflow-x:auto;">
                         <table>
                             <thead>
                                 <tr style="background-color:#B0B0B0">
                                     <th>Item</th>
                                     <th>Fecha Deposito</th>
                                     <th>Num. Deposito</th>
                                     <th>Num. Letra / Cheque</th>
                                     <th>Medio Pago</th>
                                     <th>Banco</th>
                                     <th>Monto</th>
                                     <th>Tipo Cambio</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    foreach ($index_modal_detalle as $index_modal_detalle) : ?>
                                     <tr>
                                         <td><?php echo $index_modal_detalle->item; ?></td>
                                         <td><?php echo $index_modal_detalle->fecha_deposito; ?></td>
                                         <td><?php echo $index_modal_detalle->num_deposito; ?></td>
                                         <td><?php echo $index_modal_detalle->num_letra_cheque; ?></td>
                                         <td><?php echo $index_modal_detalle->ds_medio_pago; ?></td>
                                         <td><?php echo $index_modal_detalle->ds_banco; ?></td>
                                         <td><?php echo $index_modal_detalle->monto; ?></td>
                                         <td><?php echo $index_modal_detalle->tipo_cambio; ?></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                             <tfoot>
                                 <tr>
                                     <td colspan="6" class="text-right"><strong>PAGADO <i class="mdi mdi-video-input-antenna:"></i></strong></td>
                                     <td> <?php echo $index_modal_cabecera->pagado; ?></td>
                                 </tr>
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