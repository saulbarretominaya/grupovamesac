  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Multitablas
              <button type="button" class="btn btn-warning" id="">ACTUALIZAR</button>
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Datos Generales</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <input type="hidden" class="form-control" id="id_multitabla" value="<?php echo $cabecera->id_multitabla; ?>">
                    <label class="col-sm-2 col-form-label">Nombre General</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="" value="<?php echo $cabecera->nombre_tabla; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Abreviatura</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="abreviatura">
                    </div>
                    <label class="col-sm-2 col-form-label">Descripcion</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="descripcion">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-0 col-form-label"></label>
                    <div class="col-sm-4">
                      <button type="button" class="btn btn-primary" id="id_agregar_multitabla">AGREGAR</button>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Detalle Multitablas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <table id="id_table_detalle_multitablas" class="table table-sm table-hover">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($detalle)) : ?>
                        <?php foreach ($detalle as $detalle) : ?>
                          <tr>
                            <td><?php echo $detalle->abreviatura; ?></td>
                            <td><?php echo $detalle->descripcion; ?></td>
                            <td><button type="button" class="btn btn-danger btn-xs eliminar_fila"><span class="fas fa-trash-alt"></span></button></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->

          </div>


        </div>
        <!-- /.row -->
      </div>


      <!-- /.div -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->