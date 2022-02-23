 <div class="modal-header">
     <h5 class="modal-title">Tableros</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
 </div>
 <div class="modal-body">
     <div class="row">
         <div class="col-md-12">
             <div class="form-group row">
                 <div class="col-md-10">
                     <label for="tipo_trabajador">Descripcion Tablero</label>
                     <div class="input-group">
                         <textarea class="form-control" id="descripcion_tablero" rows="1" readonly><?php echo $cabecera_modal->descripcion_tablero; ?>
                             </textarea>
                     </div>
                 </div>
                 <div class="col-md-2">
                     <label for="tipo_trabajador">Cant Tablero</label>
                     <div class="input-group">
                         <input type="text" class="form-control" value="<?php echo $cabecera_modal->cantidad_tablero; ?>" readonly>

                     </div>
                 </div>
             </div>
         </div>

         <div class="col-md-12">
             <div class="form-group row">
                 <div class="col-md-3">
                     <label for="tipo_trabajador">Codigo Tablero</label>
                     <div class="input-group">
                         <input type="text" class="form-control" value="<?php echo $cabecera_modal->codigo_tablero; ?>" readonly>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <label for="local">Marca Tablero</label>
                     <div class="input-group">
                         <input type="text" class="form-control" value="<?php echo $cabecera_modal->ds_marca_tablero; ?>" readonly>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <label for="cargo">Modelo Tablero</label>
                     <div class="input-group">
                         <input type="text" class="form-control" value="<?php echo $cabecera_modal->ds_modelo_tablero; ?>" readonly>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <label for="sexo">Tipo Moneda</label>
                     <div class="input-group">
                         <input type="text" class="form-control" value="<?php echo $cabecera_modal->ds_moneda; ?>" readonly>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Detalle -->
         <div class="col-md-12">
             <div class="card card-primary">
                 <div class="card-header">
                     <h3 class="card-title">Detalle Tablero</h3>
                 </div>
                 <form class="form-horizontal">
                     <div class="card-body" style="overflow-x:auto;">
                         <table>
                             <thead>
                                 <tr>
                                     <th>Item</th>
                                     <th>Almacen</th>
                                     <th>Codigo Producto</th>
                                     <th>Nombre Producto</th>
                                     <th>U.M.</th>
                                     <th>Marca</th>
                                     <th>Precio Unitario</th>
                                     <th>Cant Uni</th>
                                     <th>Cant Total</th>
                                     <th>Monto Total</th>
                                     <th></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php if (!empty($detalle_modal)) : ?>
                                     <?php foreach ($detalle_modal as $detalle_modal) : ?>
                                         <tr>
                                             <td><?php echo $detalle_modal->item;; ?></td>
                                             <td><?php echo $detalle_modal->ds_almacen; ?></td>
                                             <td><?php echo $detalle_modal->codigo_producto; ?></td>
                                             <td><?php echo $detalle_modal->descripcion_producto; ?></td>
                                             <td><?php echo $detalle_modal->ds_unidad_medida; ?></td>
                                             <td><?php echo $detalle_modal->ds_marca_producto; ?></td>
                                             <td><?php echo $detalle_modal->precio_unitario; ?></td>
                                             <td><?php echo $detalle_modal->cantidad_unitaria; ?></td>
                                             <td><?php echo $detalle_modal->cantidad_total_producto; ?></td>
                                             <td><?php echo $detalle_modal->monto_total_producto; ?></td>
                                             <td></td>
                                         </tr>
                                     <?php endforeach; ?>
                                 <?php endif; ?>
                             </tbody>
                         </table>
                     </div>
                 </form>
             </div>
         </div>

         <div class="col-md-12">
             <div class="form-group row">
                 <div class="col-md-2">
                     <label for="tipo_trabajador">Precio de Tablero</label>
                     <div class="input-group">
                         <input type="text" class="form-control" value="<?php echo $cabecera_modal->precio_tablero; ?>" readonly>
                     </div>
                 </div>
                 <div class="col-md-2">
                     <label for="local">% Margen</label>
                     <div class="input-group">
                         <input type="text" class="form-control" value="<?php echo $cabecera_modal->porcentaje_margen; ?>" readonly>
                     </div>
                 </div>
                 <div class="col-md-2">
                     <label for="cargo">Precio de Margen</label>
                     <div class="input-group">
                         <input type="text" class="form-control" value="<?php echo $cabecera_modal->precio_margen; ?>" readonly>
                     </div>
                 </div>
                 <div class=" col-md-3">
                     <label for="sexo">Precio Unitario por Tablero</label>
                     <div class="input-group">
                         <input type="text" class="form-control" value="<?php echo $cabecera_modal->precio_unitario_por_tablero; ?>" readonly>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <label for="sexo">Total Tableros</label>
                     <div class="input-group">
                         <input type="text" class="form-control" value="<?php echo $cabecera_modal->total_tablero; ?>" readonly>
                     </div>
                 </div>
             </div>
         </div>

     </div>

     <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
     </div>
 </div>