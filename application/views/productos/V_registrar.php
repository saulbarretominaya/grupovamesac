  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos
              <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
              <a href="<?php echo base_url(); ?>C_multitablas" class="btn btn-danger btn-sm">CANCELAR</a>
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

                  <div class="row">
                    <div class="col-sm-4">
                      <!-- checkbox -->
                      <div class="form-group row">
                        <label class="col-sm-6 col-form-label">Codigo Sunat</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="abreviatura_tabla">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- 
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">Radio</label>
                        </div>
                      </div> -->

                      <div class="form-group clearfix">
                        <div class="icheck-success d-inline">
                          <input type="checkbox" checked="" id="checkboxSuccess1">
                          <label for="checkboxSuccess1"> Success checkbox
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Codigo Sunat</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="abreviatura_tabla">
                    </div>

                    <label class="col-sm-2 col-form-label">Descripcion Sunat</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="descripcion_tabla">
                    </div>

                    <label class="col-sm-2 col-form-label">Unidad Medida</label>
                    <div class="col-sm-2">
                      <select class="form-control">
                        <option value="0">Seleccione</option>
                        <?php foreach ($cbox_unidad_medida as $cbox_unidad_medida) : ?>
                          <option value="<?php echo $cbox_unidad_medida->id_dmultitabla; ?>">
                            <?php echo $cbox_unidad_medida->abreviatura; ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Grupo</label>
                    <div class="col-sm-2">
                      <select class="form-control">
                        <option value="0">Seleccione</option>
                        <?php foreach ($cbox_grupo as $cbox_grupo) : ?>
                          <option value="<?php echo $cbox_grupo->id_dmultitabla; ?>">
                            <?php echo $cbox_grupo->abreviatura; ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Familia</label>
                    <div class="col-sm-2">
                      <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Clase</label>
                    <div class="col-sm-2">
                      <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sub Clase</label>
                    <div class="col-sm-2">
                      <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Sub Clase 2</label>
                    <div class="col-sm-2">
                      <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Marca</label>
                    <div class="col-sm-2">
                      <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Moneda</label>
                    <div class="col-sm-2">
                      <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Cta vta</label>
                    <div class="col-sm-2">
                      <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Cta ent</label>
                    <div class="col-sm-2">
                      <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Precio Costo</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="abreviatura_tabla">
                    </div>
                    <label class="col-sm-2 col-form-label">Precio Venta</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="descripcion_tabla">
                    </div>
                    <label class="col-sm-2 col-form-label">Rentabilidad</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="descripcion_tabla">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-0 col-form-label"></label>
                    <div class="col-sm-4">
                      <button type="button" class="btn btn-primary btn-sm" id="id_agregar_multitabla">AGREGAR</button>
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