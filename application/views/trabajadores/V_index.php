  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TRABAJADORES
              <a href="<?php echo base_url(); ?>C_trabajadores/enlace_registrar" class="btn btn-primary">REGISTRAR</a>
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
            <table id="id_datatable_trabajadores" class="table table-sm table-hover" style="width: 100%;">
              <thead style="background-color: #9fa53b; color: white;">
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Paterno</th>
                  <th>Materno</th>
                  <th>Celular</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($index)) : ?>
                  <?php foreach ($index as $index) : ?>
                    <tr>
                      <td><?php echo $index->id_trabajador; ?></td>
                      <td><?php echo $index->nombres; ?></td>
                      <td><?php echo $index->ape_paterno; ?></td>
                      <td><?php echo $index->ape_materno; ?></td>
                      <td><?php echo $index->celular; ?></td>
                      <td class="text-center"><button type="button" class="btn btn-info btn-xs btn-view-trabajador" value="<?php echo $index->id_trabajador; ?>" data-toggle="modal" data-target="#modal-trabajador"><span class="fa fa-search"></span></button></td>
                      <td><a href="<?php echo base_url(); ?>C_trabajadores/enlace_actualizar/<?php echo $index->id_trabajador; ?>" class="btn btn-warning btn-xs"><span class="fas fa-edit "></span></a></td>
                      <td class="text-center" style="width: 15px;"><a href="<?php echo base_url(); ?>C_trabajadores/eliminar/<?php echo $index->id_trabajador; ?>" class="btn btn-danger btn-remove btn-xs"><span class="fa fa-trash"></a></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
              <!-- <tfoot>
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Paterno</th>
                  <th>Materno</th>
                  <th>Celular</th>
                </tr>
              </tfoot> -->
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

  <!-- MODAL TRABAJADORES -->
  <div class="modal fade" id="modal-trabajador">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#48C9B0">
          <h4 class="modal-title w-100 text-center ">DETALLE DE TRABAJADORES</h4>
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
  <div class="modal fade" id="modal-trabajador2">
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