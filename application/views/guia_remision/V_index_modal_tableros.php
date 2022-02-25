 <div class="modal-header">
     <h4 class="modal-title">GUIA REMISION</h4>
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
                                         <label class="col-md-4">FECHA EMISION</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->fecha_guia_remision; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">RAZON SOCIAL</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->ds_nombre_cliente_proveedor; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">RUC</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->num_documento; ?>
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
                 <div class="col-md-12">
                     <div class="form-group row">
                         <div class="col-md-7">
                             <div class="form-group row">
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">TIPO ENVIO</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->ds_tipo_envio_guia_remision; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">PESO BRUTO TOTAL</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->peso_bruto_total; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">PUNTO DE PARTIDA</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->punto_partida; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">PUNTO DE LLEGADA</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->punto_llegada; ?>
                                         </div>
                                     </div>
                                 </div>

                             </div>
                         </div>
                         <div class="col-md-5">
                             <div class="form-group row">
                                 <div class="col-md-12">

                                     <div class="input-group">
                                         <label class="col-md-3">N. DE BULTOS</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera_tableros->num_bulto; ?>
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
                 <div class="col-md-12">
                     <div class="form-group row">
                         <div class="col-md-7">
                             <div class="form-group row">
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">TIPO TRANSPORTE</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->tipo_transporte; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">TRANSPORTISTA</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->transportista; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">PLACA</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->placa; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">MARCA Y MODELO</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->marca_modelo; ?>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-4">LICENCIA</label>
                                         <div class="col-md-8">
                                             <?php echo $index_modal_cabecera_tableros->licencia; ?>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-5">
                             <div class="form-group row">
                                 <div class="col-md-12">
                                     <div class="input-group">
                                         <label class="col-md-3">DOMICILIO</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera_tableros->domiciliado; ?>
                                         </div>
                                     </div>
                                     <div class="input-group">
                                         <label class="col-md-3">OBSERV.</label>
                                         <div class="col-md-9">
                                             <?php echo $index_modal_cabecera_tableros->observaciones; ?>
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