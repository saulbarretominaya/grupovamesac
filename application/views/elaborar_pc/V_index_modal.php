 <div class="modal-header">
     <h4 class="modal-title">ELABORACION OD</h4>
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
                                         <label class="col-md-4">FECHA OD</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->fecha_orden_despacho; ?>
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
                                         <label class="col-md-4">CONDICION PAGO</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->ds_condicion_pago; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">CLIENTE</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->ds_nombre_cliente_proveedor; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">RUC/DNI</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->num_documento; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">DIRECCION</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera->direccion_fiscal; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="input-group">
                                     <label class="col-md-4">LUGAR ENTREGA</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera->lugar_entrega; ?>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-5">
                             <div class="input-group">
                                 <label class="col-md-3">CONTACTO</label>
                                 <div class="col-md-9">
                                     <?php echo $index_modal_cabecera->nombre_encargado; ?>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-12">
                                     <center><label>DATOS DEL ASESOR COMERCIAL</label></center>
                                     <div class="input-group">
                                         <label class="col-md-3">NOMBRE</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera->ds_nombre_trabajador; ?>
                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">CELULAR</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera->celular; ?>
                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">CORREO</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera->email; ?>
                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">OBSERV.</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera->observacion; ?>
                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">CLAUSULA.</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera->clausula; ?>
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
                                     <th>Cantidad</th>
                                     <th>Codigo</th>
                                     <th>Descripcion</th>
                                     <th>Marca</th>
                                     <th>U.M.</th>
                                     <th>Precio U</th>
                                     <th>Dscto %</th>
                                     <th>Precio U/D</th>
                                     <th>Valor Venta</th>
                                     <th>Estado</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $variable_agrupamiento = "RSBM";
                                    foreach ($index_modal_detalle as $index_modal_detalle) :

                                        switch ($index_modal_detalle->ds_estado_valor_del) {
                                            case "completado":
                                                $ds_estado_del = '<div><span class="badge bg-primary">COMPLETADO</span></div>';
                                                break;
                                            case "pendiente":
                                                $ds_estado_del = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                                                break;
                                            default;
                                                $ds_estado_del = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                                                break;
                                        }

                                        if ($index_modal_detalle->id_tablero != '0') { ?>
                                         <tr style="background-color: #F0F0F0;">
                                             <?php if ($index_modal_detalle->id_tablero != $variable_agrupamiento) { ?>
                                                 <th><?php echo $index_modal_detalle->item; ?></th>
                                                 <th><?php echo $index_modal_detalle->cantidad_tablero; ?></th>
                                                 <th><?php echo $index_modal_detalle->codigo_tablero; ?></th>
                                                 <th><?php echo $index_modal_detalle->descripcion_tablero; ?></th>
                                                 <th><?php echo $index_modal_detalle->ds_marca_tablero; ?></th>
                                                 <th></th>
                                                 <th><?php echo $index_modal_detalle->precio_ganancia; ?></th>
                                                 <th><?php echo $index_modal_detalle->d_tablero; ?></th>
                                                 <th><?php echo $index_modal_detalle->precio_descuento_tablero; ?></th>
                                                 <th><?php echo $index_modal_detalle->valor_venta_tablero; ?></th>
                                                 <th><?php echo $ds_estado_del; ?></th>
                                             <?php $variable_agrupamiento = $index_modal_detalle->id_tablero;
                                                } ?>
                                         </tr>
                                     <?php } ?>
                                     <tr>
                                         <?php if ($index_modal_detalle->id_tablero != '0') { ?>
                                             <td><?php echo ""; ?></td>
                                         <?php } else { ?>
                                             <td><?php echo $index_modal_detalle->item; ?></td>
                                         <?php } ?>
                                         <td><?php echo $index_modal_detalle->cantidad_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->codigo_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->descripcion_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->ds_marca_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->ds_unidad_medida; ?></td>
                                         <td><?php echo $index_modal_detalle->precio_unitario; ?></td>
                                         <td><?php echo $index_modal_detalle->d_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->precio_descuento; ?></td>
                                         <td><?php echo $index_modal_detalle->valor_venta_con_d; ?></td>
                                         <?php if ($index_modal_detalle->id_tablero != '0') { ?>
                                             <td><?php echo ""; ?></td>
                                         <?php } else { ?>
                                             <td><?php echo $ds_estado_del; ?></td>
                                         <?php } ?>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                             <tfoot>
                                 <tfoot>
                                     <tr>
                                         <td colspan="9" class="text-right"><strong>TOTAL</strong></td>
                                         <td> <?php echo $index_modal_cabecera->valor_venta_total_sin_d; ?></td>
                                     </tr>
                                     <tr>
                                         <td colspan="9" class="text-right"><strong> DCTO TOTAL</strong></td>
                                         <td> <?php echo $index_modal_cabecera->descuento_total; ?> </td>
                                     </tr>
                                     <tr>
                                         <td colspan="9" class="text-right"><strong> TOTAL</strong></td>
                                         <td> <?php echo $index_modal_cabecera->valor_venta_total_con_d; ?> </td>
                                     </tr>
                                     <tr>
                                         <td colspan="9" class="text-right"><strong>IGV</strong></td>
                                         <td> <?php echo $index_modal_cabecera->igv; ?> </td>
                                     </tr>
                                     <tr>
                                         <td colspan="9" class="text-right"><strong>PRECIO VENTA</strong></td>
                                         <td> <?php echo $index_modal_cabecera->precio_venta; ?> </td>
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