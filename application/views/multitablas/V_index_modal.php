 <div class="modal-header">
     <h4 class="modal-title">MULTITABLAS</h4>
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
                         <div class="col-md-6">
                             <div class="form-group">
                                 <div class="col-md-12">
                                     <label class="col-md-12">CODIGO</label>
                                     <div class="col-md-12">
                                         <?php echo $index_modal_cabecera->id_multitabla; ?>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="input-group">
                                 <label class="col-md-12">NOMBRE GENERAL</label>
                                 <div class="col-md-12">
                                     <?php echo $index_modal_cabecera->nombre_tabla; ?>
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
                                     <th>ID</th>
                                     <th>ID Multitabla</th>
                                     <th>Nombre</th>
                                     <th>Abreviatura</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    foreach ($index_modal_detalle as $index_modal_detalle) : ?>
                                     <tr>
                                         <td><?php echo $index_modal_detalle->id_multitabla; ?></td>
                                         <td><?php echo $index_modal_detalle->id_dmultitabla; ?></td>
                                         <td><?php echo $index_modal_detalle->abreviatura; ?></td>
                                         <td><?php echo $index_modal_detalle->descripcion; ?></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                             <tfoot>

                             </tfoot>
                         </table>
                     </div>
                 </form>
             </div>
         </div>

     </div>
 </div>

 <div class="modal-footer justify-content-between">
     <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
 </div>