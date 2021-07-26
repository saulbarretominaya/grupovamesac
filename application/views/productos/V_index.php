  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos
              <a href="<?php echo base_url(); ?>C_productos/enlace_registrar" class="btn btn-primary btn-sm">REGISTRAR</a>
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table id="id_datatable_multitablas" class="table table-sm table-hover" style="width: 100%;">
              <thead style="background-color: #9fa53b; color: white;">
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Codigo Sunat</th>
                  <th>Descripcion Sunat</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($index)) : ?>
                  <?php foreach ($index as $index) : ?>
                    <tr>
                      <td><?php echo $index->id_producto; ?></td>
                      <td><?php echo $index->descripcion_producto; ?></td>
                      <td><?php echo $index->codigo_sunat; ?></td>
                      <td><?php echo $index->descripcion_sunat; ?></td>
                      <td><a href="<?php echo base_url(); ?>C_productos/enlace_actualizar/<?php echo $index->id_producto; ?>" class="btn btn-warning btn-xs"><span class="fas fa-edit "></span></a></td>
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