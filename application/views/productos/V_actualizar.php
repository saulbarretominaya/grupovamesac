  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos
              <button type="button" class="btn btn-warning btn-sm" id="actualizar">ACTUALIZAR</button>
              <a href="<?php echo base_url(); ?>C_multitablas" class="btn btn-danger btn-sm">CANCELAR</a>

            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Condigos ocultos -->
    <div id="container_solicitud_id_remove" name="container_solicitud_id_remove" style="display: none;">
    </div>
    <input type="hidden" class="form-control" id="id_multitabla" value="<?php echo $cabecera->id_multitabla; ?>">

    <!-- Fin de codigos ocultos-->



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

                    <label class="col-sm-2 col-form-label">Nombre General</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="nombre_tabla" value="<?php echo $cabecera->nombre_tabla; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Abreviatura</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="abreviatura_tabla">
                    </div>
                    <label class="col-sm-2 col-form-label">Descripcion</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="descripcion_tabla">
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


        </div>
        <!-- /.row -->
      </div>


      <!-- /.div -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->