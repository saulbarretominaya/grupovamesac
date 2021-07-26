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
            <table id="example" class="table table-sm table-hover" style="width: 100%;">
              <thead style="background-color: #9fa53b; color: white;">
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Paterno</th>
                  <th>Materno</th>
                  <th>Telefono</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($index)) : ?>
                  <?php foreach ($index as $index) : ?>
                    <tr>
                      <td><?php echo $index->id_trabajador; ?></td>
                      <td><?php echo $index->nombre; ?></td>
                      <td><?php echo $index->ape_paterno; ?></td>
                      <td><?php echo $index->ape_materno; ?></td>
                      <td><?php echo $index->telefono; ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Paterno</th>
                  <th>Materno</th>
                  <th>Telefono</th>
                </tr>
              </tfoot>
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