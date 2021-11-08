  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LISTA DE COMPRAS
              <a href="<?php echo base_url(); ?>C_compras/enlace_registrar" class="btn btn-primary">REGISTRAR</a>
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Listar</h3>
          </div>
          <div class="card-body">
            <table id="id_datatable_compras" class="table table-bordered table-sm table-hover" style="width: 100%;">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Proveedor</th>
                  <th>Tipo Comprobante</th>
                  <th>Serie</th>
                  <th>Condicion de Pago</th>
                  <th>Moneda</th>
                  <th>Total</th>
                  <th>Fecha Emision</th>
                  <th>Fecha Vencimiento</th>
                  <th>Observacion</th>
                  <th>Estado</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($index)) : ?>
                  <?php foreach ($index as $index) : ?>
                    <tr>
                      <td><?php echo $index->id_compras; ?></td>
                      <td><?php echo $index->ds_proveedores; ?></td>
                      <td><?php echo $index->ds_tipo_comprobante; ?></td>
                      <td><?php echo $index->numero_serie; ?></td>
                      <td><?php echo $index->ds_condicion_pago; ?></td>
                      <td><?php echo $index->ds_moneda; ?></td>
                      <td><?php echo $index->total_factura; ?></td>
                      <td><?php echo $index->fecha_emision_voucher; ?></td>
                      <td><?php echo $index->fecha_vencimiento_voucher; ?></td>
                      <td><?php echo $index->observacion_pago; ?></td>
                      <td><?php echo $index->id_estado_compra; ?></td>
                      <td><button type="button" class="btn btn-info btn-xs btn-view-compras" value="<?php echo $index->id_cliente_proveedor; ?>" data-toggle="modal" data-target="#modal-compras"><span class="fa fa-search"></span></button></td>
                      <td><a href="<?php echo base_url(); ?>C_compras/enlace_actualizar/<?php echo $index->id_compras; ?>" class="btn btn-warning btn-xs"><span class="fas fa-edit "></span></a></td>
                      <td> <a href="<?php echo base_url(); ?>C_clientes_proveedores/eliminar/<?php echo $index->id_cliente_proveedor; ?>" class="btn btn-danger btn-remove btn-xs"><span class="fa fa-trash"></a></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>

            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.div -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- MODAL CLIENTES -->
  <div class="modal fade" id="modal-clientes">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#48C9B0">
          <h4 class="modal-title w-100 text-center ">DETALLE DE CLIENTES</h4>
          <button type="button" class="close " data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <p></p>


        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <!-- MODAL ADMIN -->
  <div class="modal fade" id="modal-clientes2">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Extra Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


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

  <script>
    var base_url = "<?php echo base_url(); ?>";
  </script>

  <script src="<?php echo base_url() ?>application/js/j_compras.js"></script>

  </body>

  </html>