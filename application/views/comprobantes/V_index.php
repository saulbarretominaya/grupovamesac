  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Comprobantes
            </h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">


      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Listar Productos</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <table id="listar" class="table table-bordered table-sm table-hover" style="width: 150%;">
                    <thead>
                      <tr>
                        <th>Num. O. Despacho</th>
                        <th>Num. Orden</th>
                        <th>Num. Guia</th>
                        <th>Serie Guia</th>
                        <th>Tienda</th>
                        <th>Num. Comprobante</th>
                        <th>Serie Comprobante</th>
                        <th>Tipo Comprobante </th>
                        <th>Fecha Comprobante</th>
                        <th>Cliente</th>
                        <th>Condicion Pago</th>
                        <th>Moneda</th>
                        <th>Precio Venta</th>
                        <th>Vendedor</th>
                        <th>Tipo Orden</th>
                        <th>Estado Guia</th>
                        <th>Estado Comprobante</th>
                        <th>Estado Sunat</th>
                        <th>Consultar Estado Sunat</th>
                        <th>aaaa</th>
                        <th>bbb</th>
                        <th>ccc</th>
                        <th class="table-primary">PDF</th>
                        <th class="table-primary"> XML</th>
                        <th class="table-primary">CDR</th>
                        <th>Anular</th>
                        <th class="table-danger">PDF</th>
                        <th class="table-danger"> XML</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($index)) : ?>
                        <?php foreach ($index as $index) :

                          switch ($index->ds_estado_tipo_orden_parcial_completa) {
                            case "PARCIAL":
                              $ds_estado_tipo_orden_parcial_completa = '<div><span class="badge bg-dark">PARCIAL</span></div>';
                              break;
                            case "COMPLETA":
                              $ds_estado_tipo_orden_parcial_completa = '<div><span class="badge bg-primary">COMPLETA</span></div>';
                              break;
                          }
                          switch ($index->ds_estado_guia_remision) {
                            case "PENDIENTE":
                              $ds_estado_guia_remision = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                            case "APROBADO":
                              $ds_estado_guia_remision = '<div><span class="badge bg-success">APROBADO</span></div>';
                              break;
                            default:
                              $ds_estado_guia_remision = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                          }

                          switch ($index->ds_estado_comprobante) {
                            case "PENDIENTE":
                              $ds_estado_comprobante = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                            case "PENDIENTE POR EMITIR":
                              $ds_estado_comprobante = '<div><span class="badge bg-dark">PENDIENTE POR EMITIR</span></div>';
                              break;
                            case "EMITIDO A SUNAT":
                              $ds_estado_comprobante = '<div><span class="badge bg-info">EMITIDO A SUNAT</span></div>';
                              break;
                            default:
                              $ds_estado_comprobante = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                          }

                          switch ($index->ds_estado_sunat) {

                            case "0":
                              $ds_estado_sunat = '<div><span class="badge bg-danger">RECHAZADO</span></div>';
                              break;
                            case "1":
                              $ds_estado_sunat = '<div><span class="badge bg-success">ACEPTADO</span></div>';
                              break;
                            case "2":
                              $ds_estado_sunat = '<div><span class="badge bg-secondary">PENDIENTE POR PROVEEDOR</span></div>';
                              break;
                            case "3":
                              $ds_estado_sunat = '<div><span class="badge bg-dark">ANULADO</span></div>';
                              break;
                            default:
                              $ds_estado_sunat = '<div><span class="badge bg-warning">NO EMITIDO</span></div>';
                              break;
                          }

                        ?>
                          <tr>

                            <td><?php echo $index->id_orden_despacho; ?></td>
                            <td><?php echo $index->id_parcial_completa; ?></td>
                            <td><?php echo $index->id_tienda; ?></td>
                            <td><?php echo $index->ds_serie_guia_remision; ?></td>
                            <td><?php echo $index->ds_sucursal_trabajador; ?></td>
                            <input type="hidden" id="id_comprobante" value="<?php echo $index->id_comprobante; ?>">
                            <input type="hidden" id="ds_estado_comprobante" value="<?php echo $index->ds_estado_comprobante; ?>">
                            <input type="hidden" id="ds_estado_sunat" value="<?php echo $index->ds_estado_sunat; ?>">
                            <td><?php echo $index->num_comprobante;  ?></td>
                            <td><?php echo $index->ds_serie_comprobante;  ?></td>
                            <td><?php echo $index->ds_tipo_comprobante;  ?></td>
                            <td><?php echo $index->fecha_comprobante;  ?></td>
                            <td><?php echo $index->ds_nombre_cliente_proveedor; ?></td>
                            <td><?php echo $index->ds_condicion_pago; ?></td>
                            <td><?php echo $index->ds_moneda; ?></td>
                            <td><?php echo $index->precio_venta; ?></td>
                            <td><?php echo $index->ds_nombre_trabajador; ?></td>
                            <td><?php echo $ds_estado_tipo_orden_parcial_completa; ?></td>
                            <td><?php echo $ds_estado_guia_remision; ?></td>
                            <td><?php echo $ds_estado_comprobante; ?></td>
                            <td><?php echo $ds_estado_sunat; ?></td>

                            <?php if ($index->id_comprobante != "" and $index->ds_estado_comprobante == "PENDIENTE POR EMITIR") { ?>
                              <td></td>
                              <td><button type="button" class="btn btn-outline-success btn-sm js_generar_comprobantes_electronicos"><span class="fas fa-cloud-upload-alt"></span></button></td>
                              <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_comprobantes_productos" value="<?php echo $index->id_comprobante; ?>" data-toggle="modal" data-target="#id_target_comprobantes_productos"><span class="fas fa-search-plus"></span></button></td>
                              <td><a href=" <?php echo base_url(); ?>C_comprobantes/enlace_actualizar/<?php echo $index->id_comprobante; ?>" class="btn btn btn-outline-warning btn-sm"><span class="far fa-edit"></span></a></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>


                            <?php } else if ($index->id_comprobante != "" and $index->ds_estado_comprobante == "EMITIDO A SUNAT") { ?>

                              <!-- CONSULTAR ESTADO SUNAT, LUPA Y CHECK -->
                              <?php if ($index->ds_estado_sunat == "1" || $index->ds_estado_sunat == "3") { ?>
                                <td><button type="button" class="btn btn-outline-info btn-sm js_consultar_comprobantes_electronicos" value="<?php echo $index->id_comprobante; ?>" data-toggle="modal" data-target="#id_target_consultar_comprobantes_electronicos"><span class="fas fa-search-plus"></span></button></td>
                              <?php } else if ($index->ds_estado_sunat == "2") { ?>
                                <td>
                                  <button type="button" class="btn btn-outline-info btn-sm js_lupa_comprobantes_productos" value="<?php echo $index->id_comprobante; ?>" data-toggle="modal" data-target="#id_target_comprobantes_productos"><span class="fas fa-search-plus"></span></button>
                                  <button type="button" class="btn btn-outline-success btn-sm js_actualizar_estado_sunat"><span class="fas fa-check-circle"></span></button>
                                </td>
                              <?php } else { ?>
                                <td></td>
                              <?php } ?>
                              <!-- FIN CONSULTAR ESTADO SUNAT, LUPA Y CHECK -->


                              <!-- NUBE,LUPA,EDITAR, PDF,XML -->
                              <td><button type="button" class="btn btn-outline-success btn-sm" disabled><span class="fas fa-cloud-upload-alt"></span></button></td>
                              <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_comprobantes_productos" value="<?php echo $index->id_comprobante; ?>" data-toggle="modal" data-target="#id_target_comprobantes_productos"><span class="fas fa-search-plus"></span></button></td>
                              <td><button type="button" class="btn btn-outline-warning btn-sm" disabled><span class="far fa-edit"></span></button></td>
                              <td><a href="<?php echo $index->enlace_del_pdf_comprobante_emitido ?>" class="btn btn-outline-danger btn-sm" download="" target="_blank"><span class="fas fa-file-pdf"></span></a></td>
                              <td><a href="<?php echo $index->enlace_del_xml_comprobante_emitido ?>" class="btn btn-outline-secondary btn-sm" download="" target="_blank"><span class="fas fa-file-archive"></span></a></td>
                              <!-- FIN NUBE,LUPA,EDITAR, PDF,XML -->


                              <!-- CDR -->
                              <?php if ($index->ds_estado_sunat == "1") { ?>
                                <td><a href="<?php echo $index->enlace_del_cdr_comprobante_emitido ?>" class="btn btn-outline-secondary btn-sm" download="" target="_blank"><span class="fas fa-file-archive"></span></a></td>
                              <?php } else { ?>
                                <td></td>
                              <?php } ?>
                              <!-- FIN CDR -->


                              <!-- ANULAR, PDF Y XML -->
                              <?php if ($index->ds_estado_sunat == "1") { ?>
                                <td><button type="button" class="btn btn-outline-danger btn-sm js_anular_comprobantes_electronicos"><span class="fas fa-times-circle"></span></button></td>
                                <td></td>
                                <td></td>
                              <?php } else if ($index->ds_estado_sunat == "3") { ?>
                                <td></td>
                                <td><a href="<?php echo $index->enlace_del_pdf_comprobante_anulado ?>" class="btn btn-outline-danger btn-sm" download="" target="_blank"><span class="fas fa-file-archive"></span></a></td>
                                <td><a href="<?php echo $index->enlace_del_xml_comprobante_anulado ?>" class="btn btn-outline-secondary btn-sm" download="" target="_blank"><span class="fas fa-file-pdf"></span></a></td>
                              <?php } else { ?>
                                <td></td>
                                <td></td>
                                <td></td>
                              <?php } ?>
                              <!-- FIN ANULAR, PDF Y XML -->



                            <?php } else { ?>
                              <td></td>
                              <td><button type="button" class="btn btn-outline-success btn-sm" disabled><span class="fas fa-cloud-upload-alt"></span></button></td>
                              <td><button type="button" class="btn btn-outline-info btn-sm" disabled><span class="fas fa-search-plus"></span></button></td>
                              <td><a href=" <?php echo base_url(); ?>C_comprobantes/enlace_registrar/<?php echo $index->id_guia_remision; ?>" class="btn btn btn-outline-warning btn-sm"><span class="far fa-edit"></span></a></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            <?php } ?>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Listar Tableros</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <table id="listar_2" class="table table-bordered table-sm table-hover" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Num. O. Despacho</th>
                        <th>Num Orden</th>
                        <th>Num. Guia</th>
                        <th>Serie Guia</th>
                        <th>Tienda</th>
                        <th>Num. Comprobante</th>
                        <th>Serie Comprobante</th>
                        <th>Tipo Comprobante </th>
                        <th>Fecha Comprobante</th>
                        <th>Cliente</th>
                        <th>Condicion Pago</th>
                        <th>Moneda</th>
                        <th>Precio Venta</th>
                        <th>Vendedor</th>
                        <th>Tipo Orden</th>
                        <th>Estado Guia</th>
                        <th>Estado Comprobante</th>

                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($index_2)) : ?>
                        <?php foreach ($index_2 as $index) :

                          switch ($index->ds_estado_tipo_orden_parcial_completa) {
                            case "PARCIAL":
                              $ds_estado_tipo_orden_parcial_completa = '<div><span class="badge bg-dark">PARCIAL</span></div>';
                              break;
                            case "COMPLETA":
                              $ds_estado_tipo_orden_parcial_completa = '<div><span class="badge bg-primary">COMPLETA</span></div>';
                              break;
                          }
                          switch ($index->ds_estado_guia_remision) {
                            case "PENDIENTE":
                              $ds_estado_guia_remision = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                            case "APROBADO":
                              $ds_estado_guia_remision = '<div><span class="badge bg-success">APROBADO</span></div>';
                              break;
                            default:
                              $ds_estado_guia_remision = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                          }

                          switch ($index->ds_estado_comprobante) {
                            case "PENDIENTE":
                              $ds_estado_comprobante = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                            case "PENDIENTE POR FACTURAR":
                              $ds_estado_comprobante = '<div><span class="badge bg-dark">PENDIENTE POR FACTURAR</span></div>';
                              break;
                            case "FACTURADO":
                              $ds_estado_comprobante = '<div><span class="badge bg-success">FACTURADO</span></div>';
                              break;
                            default:
                              $ds_estado_comprobante = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                          }


                        ?>
                          <tr>
                            <td><?php echo $index->id_orden_despacho; ?></td>
                            <td><?php echo $index->id_parcial_completa; ?></td>
                            <td><?php echo $index->id_tienda; ?></td>
                            <td><?php echo $index->ds_serie_guia_remision; ?></td>
                            <td><?php echo $index->ds_sucursal_trabajador; ?></td>

                            <td><?php echo $index->num_comprobante;  ?></td>
                            <td><?php echo $index->ds_serie_comprobante;  ?></td>
                            <td><?php echo $index->ds_tipo_comprobante;  ?></td>

                            <td><?php echo $index->fecha_comprobante;  ?></td>
                            <td><?php echo $index->ds_nombre_cliente_proveedor; ?></td>
                            <td><?php echo $index->ds_condicion_pago; ?></td>
                            <td><?php echo $index->ds_moneda; ?></td>
                            <td><?php echo $index->precio_venta; ?></td>
                            <td><?php echo $index->ds_nombre_trabajador; ?></td>
                            <td><?php echo $ds_estado_tipo_orden_parcial_completa; ?></td>
                            <td><?php echo $ds_estado_guia_remision; ?></td>
                            <td><?php echo $ds_estado_comprobante; ?></td>
                            <?php if ($index->id_comprobante != "") { ?>
                              <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_comprobantes_productos" value="<?php echo $index->id_comprobante; ?>" data-toggle="modal" data-target="#id_target_comprobantes_productos"><span class="fas fa-search-plus"></span></button></td>
                              <td><a href=" <?php echo base_url(); ?>C_comprobantes/enlace_actualizar/<?php echo $index->id_comprobante; ?>" class="btn btn btn-outline-warning btn-sm"><span class="far fa-edit"></span></a></td>
                            <?php } else { ?>
                              <td><button type="button" class="btn btn-outline-info btn-sm "><span class="fas fa-angle-double-right"></span></button></td>
                              <td><a href=" <?php echo base_url(); ?>C_comprobantes/enlace_registrar/<?php echo $index->id_guia_remision; ?>" class="btn btn btn-outline-warning btn-sm"><span class="far fa-edit"></span></a></td>
                            <?php } ?>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </section>
  </div>


  <!-- Inicio Modal Comprobantes Productos -->
  <div class="modal fade" id="id_target_comprobantes_productos" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <!-- Fin de Modal Comprobantes Productos -->

  <!-- Inicio Modal Comprobantes Tableros -->
  <div class="modal fade" id="id_target_comprobantes_tableros" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <!-- Fin de Modal Comprobantes Tableros -->

  <!-- Inicio Modal Comprobantes Productos -->
  <div class="modal fade" id="id_target_consultar_comprobantes_electronicos" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <!-- Fin de Modal Comprobantes Productos -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>plantilla/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url() ?>plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>plantilla/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() ?>plantilla/dist/js/demo.js"></script>
  <!-- Page specific script -->

  <script src="<?php echo base_url() ?>plantilla/plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url() ?>plantilla/plugins/inputmask/jquery.inputmask.min.js"></script>
  <script src="<?php echo base_url(); ?>plantilla/plugins/alertify/alertify.js"></script>

  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>plantilla/plugins/DataTables/datatables.js"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url() ?>plantilla/plugins/select2/js/select2.full.min.js"></script>

  <script>
    var base_url = "<?php echo base_url(); ?>";
  </script>

  <script src="<?php echo base_url() ?>application/js/j_comprobantes.js"></script>

  </body>

  </html>