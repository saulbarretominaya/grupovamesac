 <div class="modal-header">
     <h4 class="modal-title">CONSULTAR COMPROBANTES SUNAT</h4>
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
                         <div class="col-md-12">
                             <div class="form-group row">
                                 <?php if (isset($leer_respuesta['errors'])) { ?>
                                     <div class="col-md-12">
                                         <div class="input-group">
                                             <label class="col-md-4">RESPUESTA SUNAT</label>
                                             <div class="col-md-8">
                                                 <?php echo $leer_respuesta['errors']; ?>
                                             </div>
                                         </div>
                                     </div>
                                 <?php  } else { ?>
                                     <div class="col-md-12">
                                         <div class="input-group">
                                             <label class="col-md-4">SERIE</label>
                                             <div class="col-md-8">
                                                 <?php echo $leer_respuesta['serie']; ?>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="input-group">
                                             <label class="col-md-4">NUMERO</label>
                                             <div class="col-md-8">
                                                 <?php echo $leer_respuesta['numero']; ?>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="input-group">
                                             <label class="col-md-4">RESPUESTA SUNAT</label>
                                             <div class="col-md-8">
                                                 <?php echo $leer_respuesta['sunat_description']; ?>
                                             </div>
                                         </div>
                                     </div>
                                 <?php } ?>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- <div class=" modal-footer justify-content-between">
     <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-exit"> CERRAR</span></button>
 </div> -->