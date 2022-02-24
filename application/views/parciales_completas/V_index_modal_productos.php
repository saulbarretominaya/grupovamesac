 <div class="modal-header">
     <h4 class="modal-title">PARCIALES COMPLETAS</h4>
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
                                         <label class="col-md-4">FECHA ORDEN</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_productos->fecha_parcial_completa; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">MONEDA</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_productos->ds_moneda; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">CONDICION PAGO</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_productos->ds_condicion_pago; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">CLIENTE</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_productos->ds_nombre_cliente_proveedor; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">RUC/DNI</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_productos->num_documento; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">DIRECCION</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_productos->direccion_fiscal; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="input-group">
                                     <label class="col-md-4">LUGAR ENTREGA</label>
                                     <div class="col-md-8">
                                         <?php echo $index_modal_cabecera_productos->lugar_entrega; ?>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-5">
                             <div class="input-group">
                                 <label class="col-md-3">CONTACTO</label>
                                 <div class="col-md-9">
                                     <?php echo $index_modal_cabecera_productos->nombre_encargado; ?>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-12">
                                     <center><label>DATOS DEL ASESOR COMERCIAL</label></center>
                                     <div class="input-group">
                                         <label class="col-md-3">NOMBRE</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera_productos->ds_nombre_trabajador; ?>
                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">CELULAR</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera_productos->celular; ?>
                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">CORREO</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera_productos->email; ?>
                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">OBSERV.</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera_productos->observacion; ?>
                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">CLAUSULA.</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera_productos->clausula; ?>
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
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    foreach ($index_modal_detalle_productos as $index_modal_detalle) : ?>
                                     <tr>
                                         <td><?php echo $index_modal_detalle->item; ?></td>
                                         <td><?php echo $index_modal_detalle->cantidad; ?></td>
                                         <td><?php echo $index_modal_detalle->codigo_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->descripcion_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->ds_marca_producto; ?></td>
                                         <td><?php echo $index_modal_detalle->ds_unidad_medida; ?></td>
                                         <td><?php echo $index_modal_detalle->precio_u; ?></td>
                                         <td><?php echo $index_modal_detalle->d; ?></td>
                                         <td><?php echo $index_modal_detalle->precio_u_d; ?></td>
                                         <td><?php echo $index_modal_detalle->valor_venta; ?></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                             <tfoot>
                                 <tfoot>
                                     <tr>
                                         <td colspan="9" class="text-right"><strong>TOTAL BRUTO</strong></td>
                                         <td> <?php echo $index_modal_cabecera_productos->valor_venta_total_sin_d; ?></td>
                                     </tr>
                                     <tr>
                                         <td colspan="9" class="text-right"><strong> DCTO TOTAL</strong></td>
                                         <td> <?php echo $index_modal_cabecera_productos->descuento_total; ?> </td>
                                     </tr>
                                     <tr>
                                         <td colspan="9" class="text-right"><strong> TOTAL</strong></td>
                                         <td> <?php echo $index_modal_cabecera_productos->valor_venta_total_con_d; ?> </td>
                                     </tr>
                                     <tr>
                                         <td colspan="9" class="text-right"><strong>IGV</strong></td>
                                         <td> <?php echo $index_modal_cabecera_productos->igv; ?> </td>
                                     </tr>
                                     <tr>
                                         <td colspan="9" class="text-right"><strong>PRECIO VENTA</strong></td>
                                         <td> <?php echo $index_modal_cabecera_productos->precio_venta; ?> </td>
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