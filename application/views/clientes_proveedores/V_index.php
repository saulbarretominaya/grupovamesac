  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CLIENTES - PROVEEDORES
              <a href="<?php echo base_url(); ?>C_clientes_proveedores/enlace_registrar" class="btn btn-primary">REGISTRAR</a>
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
                  <th>Tipo Persona</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($index)) : ?>
                  <?php foreach ($index as $index) : ?>
                    <tr>
                      <td><?php echo $index->id_cliente_proveedor; ?></td>
                      <td><?php echo $index->nombres; ?></td>
                      <td><?php echo $index->ape_paterno; ?></td>
                      <td><?php echo $index->ape_materno; ?></td>
                      <td><?php echo $index->ape_materno; ?></td>
                      <!-- <td><a href="<?php echo base_url(); ?>C_trabajadores/enlace_actualizar/<?php echo $index->id_trabajador; ?>" class="btn btn-warning btn-xs"><span class="fas fa-edit "></span></a></td>
                      <td class="text-center" style="width: 15px;"><a href="<?php echo base_url(); ?>C_trabajadores/eliminar/<?php echo $index->id_trabajador; ?>" class="btn btn-danger btn-remove btn-xs"><span class="fa fa-trash"></a></td> -->
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
                  <th>Celular</th>
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