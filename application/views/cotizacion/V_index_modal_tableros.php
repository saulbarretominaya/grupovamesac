 <div class="modal-header">
     <h4 class="modal-title">COTIZACION</h4>
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
                                             <?php echo $index_modal_cabecera_tableros->fecha_emision; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">VALIDEZ OFERTA</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->validez_oferta_cotizacion; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">FECHA VENC. COT</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->fecha_vencimiento_validez_oferta; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">MONEDA</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->ds_moneda; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">CONDICION PAGO</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->ds_condicion_pago; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">CLIENTE</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->ds_nombre_cliente_proveedor; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">RUC/DNI</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->num_documento; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">DIRECCION</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->direccion_fiscal; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="input-group">
                                     <label class="col-md-4">LUGAR ENTREGA</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera_tableros->lugar_entrega; ?>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-5">
                             <div class="input-group">
                                 <label class="col-md-3">CONTACTO</label>
                                 <div class="col-md-9">
                                     <?php echo $index_modal_cabecera_tableros->nombre_encargado; ?>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-12">
                                     <center><label>DATOS DEL ASESOR COMERCIAL</label></center>
                                     <div class="input-group">
                                         <label class="col-md-3">NOMBRE</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera_tableros->ds_nombre_trabajador; ?>
                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">CELULAR</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera_tableros->celular; ?>
                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">CORREO</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera_tableros->email; ?>
                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">OBSERV.</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera_tableros->observacion; ?>
                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">CLAUSULA.</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera_tableros->clausula; ?>
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
                                 <tr style="background-color:#B0B0B0">
                                     <th>Item</th>
                                     <th>Cantidad Unitaria</th>
                                     <th>Cantidad Total</th>
                                     <th>Codigo</th>
                                     <th>Descripcion</th>
                                     <th>Marca</th>
                                     <th>U.M.</th>
                                     <th>Precio U</th>
                                     <th>Dscto %</th>
                                     <th>Precio U/D</th>
                                     <th>Valor Venta</th>
                                     <th>Dias Entrega</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $variable_agrupamiento = "RSBM";
                                    foreach ($index_modal_detalle_tableros as $index_modal_detalle) :
                                        if ($index_modal_detalle->id_tablero != '0') { ?>
                                         <?php if ($index_modal_detalle->id_tablero != $variable_agrupamiento) { ?>
                                             <tr style="background-color: #F0F0F0;">
                                                 <th><?php echo $index_modal_detalle->item_tablero_cabecera; ?></th>
                                                 <th><?php echo '' ?></th>
                                                 <th><?php echo $index_modal_detalle->cantidad_tablero_cabecera; ?></th>
                                                 <th><?php echo $index_modal_detalle->codigo_tablero_cabecera; ?></th>
                                                 <th><?php echo $index_modal_detalle->descripcion_tablero_cabecera; ?></th>
                                                 <th><?php echo $index_modal_detalle->marca_tablero_cabecera; ?></th>
                                                 <th><?php echo '' ?></th>
                                                 <th><?php echo $index_modal_detalle->precio_u_tablero_cabecera; ?></th>
                                                 <th><?php echo $index_modal_detalle->porcentaje_descuento_tablero_cabecera; ?></th>
                                                 <th><?php echo $index_modal_detalle->precio_u_d_tablero_cabecera; ?></th>
                                                 <th><?php echo $index_modal_detalle->valor_venta_tablero_cabecera; ?></th>
                                                 <th><?php echo $index_modal_detalle->dias_entrega_tablero_cabecera; ?></th>
                                                 <?php $variable_agrupamiento = $index_modal_detalle->id_tablero; ?>
                                             </tr>
                                         <?php } ?>
                                     <?php } ?>
                                     <tr>
                                         <td></td>
                                         <td><?php echo $index_modal_detalle->cantidad_unitaria_componente; ?></td>
                                         <td><?php echo $index_modal_detalle->cantidad_total_componente; ?></td>
                                         <td><?php echo $index_modal_detalle->codigo_componente; ?></td>
                                         <td><?php echo $index_modal_detalle->descripcion_componente; ?></td>
                                         <td><?php echo $index_modal_detalle->marca_componente; ?></td>
                                         <td><?php echo $index_modal_detalle->unidad_medida_componente; ?></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                             <tfoot>
                                 <tfoot>
                                     <tr>
                                         <td colspan="10" class="text-right"><strong>TOTAL BRUTO</strong></td>
                                         <td> <?php echo $index_modal_cabecera_tableros->valor_venta_total_sin_d; ?></td>
                                     </tr>
                                     <tr>
                                         <td colspan="10" class="text-right"><strong> DCTO TOTAL</strong></td>
                                         <td> <?php echo $index_modal_cabecera_tableros->descuento_total; ?> </td>
                                     </tr>
                                     <tr>
                                         <td colspan="10" class="text-right"><strong> TOTAL</strong></td>
                                         <td> <?php echo $index_modal_cabecera_tableros->valor_venta_total_con_d; ?> </td>
                                     </tr>
                                     <tr>
                                         <td colspan="10" class="text-right"><strong>IGV</strong></td>
                                         <td> <?php echo $index_modal_cabecera_tableros->igv; ?> </td>
                                     </tr>
                                     <tr>
                                         <td colspan="10" class="text-right"><strong>PRECIO VENTA</strong></td>
                                         <td> <?php echo $index_modal_cabecera_tableros->precio_venta; ?> </td>
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