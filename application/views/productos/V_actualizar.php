  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Botones -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos
              <button type="button" class="btn btn-warning btn-sm" id="actualizar_productos">ACTUALIZAR</button>
              <a href="<?php echo base_url(); ?>C_productos" class="btn btn-danger btn-sm">CANCELAR</a>
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- section -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">

          <!-- Datos Producto -->
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Datos de Productos</h3>
              </div>
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Codigo</label>
                        <div class="col-sm-6">
                          <input type="hidden" id="id_producto" value="<?php echo $enlace_actualizar->id_producto ?>">
                          <input type="text" class="form-control" id="codigo_producto" name="codigo_producto" readonly="" value="<?php echo $enlace_actualizar->codigo_producto ?>">
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-2">
                      <!-- <div class="form-group clearfix"> -->
                      <!-- <div class="icheck-success d-inline"> -->
                      <!-- <input type="checkbox" checked="" id="correlativo_producto">
                          <label for="">Automatico
                          </label> -->

                      <input type="radio" id="automatico" disabled>Automatico<br>
                      <input type="radio" id="manual">Manual<br>

                      <!-- </div> -->
                      <!-- </div> -->
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Almacen</label>
                        <div class="col-sm-9">
                          <select class="form-control select2" id="id_almacen" style="width: 100%;">
                            <option value="0">Seleccione</option>

                            <?php foreach ($cbox_almacen as $cbox_almacen) : ?>
                              <?php if ($cbox_almacen->id_dmultitabla == $enlace_actualizar->id_almacen) : ?>
                                <option value="<?php echo $cbox_almacen->id_dmultitabla ?>" selected>
                                  <?php echo $cbox_almacen->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_almacen->id_dmultitabla ?>">
                                  <?php echo $cbox_almacen->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>

                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Unidad Medida</label>
                        <div class="col-sm-5">
                          <!-- <select class="form-control"> -->
                          <select class="form-control select2" id="id_unidad_medida" style="width: 100%;">
                            <option value="0">Seleccione</option>

                            <?php foreach ($cbox_unidad_medida as $cbox_unidad_medida) : ?>
                              <?php if ($cbox_unidad_medida->id_dmultitabla == $enlace_actualizar->id_unidad_medida) : ?>
                                <option value="<?php echo $cbox_unidad_medida->id_dmultitabla ?>" selected>
                                  <?php echo $cbox_unidad_medida->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_unidad_medida->id_dmultitabla ?>">
                                  <?php echo $cbox_unidad_medida->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>

                          </select>
                        </div>

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Codigo Sunat</label>
                        <div class="col-sm-9">
                          <select class="form-control select2" id="id_sunat" style="width: 100%;">
                            <option value="0">Seleccione</option>

                            <?php foreach ($cbox_codigos_sunat as $cbox_codigos_sunat) : ?>
                              <?php if ($cbox_codigos_sunat->id_dmultitabla == $enlace_actualizar->id_sunat) : ?>
                                <option value="<?php echo $cbox_codigos_sunat->id_dmultitabla ?>" selected>
                                  <?php echo $cbox_codigos_sunat->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_codigos_sunat->id_dmultitabla ?>">
                                  <?php echo $cbox_codigos_sunat->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>

                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Descripcion</label>
                        <div class="col-sm-9">
                          <input type="" class="form-control" id="descripcion_producto" value="<?php echo $enlace_actualizar->descripcion_producto ?>">
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Stock</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" id="abreviatura_tabla">
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
                <!-- /.card-body -->
              </form>
            </div>
          </div>

          <!-- Factores -->
          <div class="col-md-12">

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Factores</h3>
              </div>

              <form class="form-horizontal">
                <div class="card-body">

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Moneda</label>
                    <div class="col-sm-2">
                      <select class="form-control" id="id_moneda">
                        <option value="0">Seleccione</option>

                        <?php foreach ($cbox_moneda as $cbox_moneda) : ?>
                          <?php if ($cbox_moneda->id_dmultitabla == $enlace_actualizar->id_moneda) : ?>
                            <option value="<?php echo $cbox_moneda->id_dmultitabla ?>" selected>
                              <?php echo $cbox_moneda->descripcion; ?>
                            </option>
                          <?php else : ?>
                            <option value="<?php echo $cbox_moneda->id_dmultitabla ?>">
                              <?php echo $cbox_moneda->descripcion; ?>
                            </option>
                          <?php endif; ?>
                        <?php endforeach; ?>

                      </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Precio Costo</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="precio_costo" value="<?php echo $enlace_actualizar->precio_costo ?>">
                    </div>

                    <label class="col-sm-2 col-form-label">Porcentaje %</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="porcentaje" name="porcentaje" value="<?php echo $enlace_actualizar->porcentaje ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">G. Unidad</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="ganancia_unidad" name="ganancia_unidad" readonly="" value="<?php echo $enlace_actualizar->ganancia_unidad ?>">
                    </div>
                    <label class="col-sm-2 col-form-label">Precio Unitario</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="precio_unitario" name="precio_unitario" readonly="" value="<?php echo $enlace_actualizar->precio_unitario ?>">
                    </div>
                    <label class="col-sm-2 col-form-label">Rentabilidad %</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="rentabilidad" name="rentabilidad" readonly="" value="<?php echo $enlace_actualizar->rentabilidad ?>">
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->
          </div>

          <!-- Caracteristica del Producto -->
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Caracteristica del Producto</h3>
              </div>

              <form class="form-horizontal">
                <div class="card-body">

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Grupo</label>
                    <div class="col-sm-2">
                      <!-- <select class="form-control" id="id_grupo"> -->
                      <select class="form-control select2" id="id_grupo" style="width: 100%;">

                        <option value="0">Seleccione</option>

                        <?php foreach ($cbox_grupo as $cbox_grupo) : ?>
                          <?php if ($cbox_grupo->id_dmultitabla == $enlace_actualizar->id_grupo) : ?>
                            <option value="<?php echo $cbox_grupo->id_dmultitabla ?>" selected>
                              <?php echo $cbox_grupo->descripcion; ?>
                            </option>
                          <?php else : ?>
                            <option value="<?php echo $cbox_grupo->id_dmultitabla ?>">
                              <?php echo $cbox_grupo->descripcion; ?>
                            </option>
                          <?php endif; ?>
                        <?php endforeach; ?>

                      </select>
                    </div>

                    <label class="col-sm-2 col-form-label">Familia</label>
                    <div class="col-sm-2">
                      <!-- <select class="form-control" id="id_familia"> -->
                      <select class="form-control select2" id="id_familia" style="width: 100%;">
                        <option value="0">Seleccione</option>

                        <?php foreach ($cbox_familia as $cbox_familia) : ?>
                          <?php if ($cbox_familia->id_dmultitabla == $enlace_actualizar->id_familia) : ?>
                            <option value="<?php echo $cbox_familia->id_dmultitabla ?>" selected>
                              <?php echo $cbox_familia->descripcion; ?>
                            </option>
                          <?php else : ?>
                            <option value="<?php echo $cbox_familia->id_dmultitabla ?>">
                              <?php echo $cbox_familia->descripcion; ?>
                            </option>
                          <?php endif; ?>
                        <?php endforeach; ?>

                      </select>
                    </div>

                    <label class="col-sm-2 col-form-label">Clase</label>
                    <div class="col-sm-2">
                      <!-- <select class="form-control" id="id_clase"> -->
                      <select class="form-control select2" id="id_clase" style="width: 100%;">

                        <option value="0">Seleccione</option>

                        <?php foreach ($cbox_clase as $cbox_clase) : ?>
                          <?php if ($cbox_clase->id_dmultitabla == $enlace_actualizar->id_clase) : ?>
                            <option value="<?php echo $cbox_clase->id_dmultitabla ?>" selected>
                              <?php echo $cbox_clase->descripcion; ?>
                            </option>
                          <?php else : ?>
                            <option value="<?php echo $cbox_clase->id_dmultitabla ?>">
                              <?php echo $cbox_clase->descripcion; ?>
                            </option>
                          <?php endif; ?>
                        <?php endforeach; ?>

                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sub Clase</label>
                    <div class="col-sm-2">
                      <!-- <select class="form-control" id="id_sub_clase"> -->
                      <select class="form-control select2" id="id_sub_clase" style="width: 100%;">

                        <option value="0">Seleccione</option>

                        <?php foreach ($cbox_sub_clase as $cbox_sub_clase) : ?>
                          <?php if ($cbox_sub_clase->id_dmultitabla == $enlace_actualizar->id_sub_clase) : ?>
                            <option value="<?php echo $cbox_sub_clase->id_dmultitabla ?>" selected>
                              <?php echo $cbox_sub_clase->descripcion; ?>
                            </option>
                          <?php else : ?>
                            <option value="<?php echo $cbox_sub_clase->id_dmultitabla ?>">
                              <?php echo $cbox_sub_clase->descripcion; ?>
                            </option>
                          <?php endif; ?>
                        <?php endforeach; ?>

                      </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Sub Clase 2</label>
                    <div class="col-sm-2">
                      <!-- <select class="form-control" id="id_sub_clase_dos"> -->
                      <select class="form-control select2" id="id_sub_clase_dos" style="width: 100%;">

                        <option value="0">Seleccione</option>

                        <?php foreach ($cbox_sub_clase_dos as $cbox_sub_clase_dos) : ?>
                          <?php if ($cbox_sub_clase_dos->id_dmultitabla == $enlace_actualizar->id_sub_clase_dos) : ?>
                            <option value="<?php echo $cbox_sub_clase_dos->id_dmultitabla ?>" selected>
                              <?php echo $cbox_sub_clase_dos->descripcion; ?>
                            </option>
                          <?php else : ?>
                            <option value="<?php echo $cbox_sub_clase_dos->id_dmultitabla ?>">
                              <?php echo $cbox_sub_clase_dos->descripcion; ?>
                            </option>
                          <?php endif; ?>
                        <?php endforeach; ?>

                      </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Marca</label>
                    <div class="col-sm-2">
                      <select class="form-control select2" id="id_marca_producto" style="width: 100%;">

                        <option value="0">Seleccione</option>

                        <?php foreach ($cbox_marca_productos as $cbox_marca_productos) : ?>
                          <?php if ($cbox_marca_productos->id_dmultitabla == $enlace_actualizar->id_marca_producto) : ?>
                            <option value="<?php echo $cbox_marca_productos->id_dmultitabla ?>" selected>
                              <?php echo $cbox_marca_productos->descripcion; ?>
                            </option>
                          <?php else : ?>
                            <option value="<?php echo $cbox_marca_productos->id_dmultitabla ?>">
                              <?php echo $cbox_marca_productos->descripcion; ?>
                            </option>
                          <?php endif; ?>
                        <?php endforeach; ?>

                      </select>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
              </form>
            </div>
          </div>

          <!-- Datos Cuentas Sunat -->
          <div class="col-md-12">

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Datos Cuentas Sunat</h3>
              </div>

              <form class="form-horizontal">
                <div class="card-body">

                  <div class="form-group row">

                    <label class="col-sm-2 col-form-label">Cta vta</label>
                    <div class="col-sm-4">
                      <select class="form-control select2" id="id_cta_vta" style="width: 100%;">

                        <option value="0">Seleccione</option>

                        <?php foreach ($cbox_cta_vta as $cbox_cta_vta) : ?>
                          <?php if ($cbox_cta_vta->id_dmultitabla == $enlace_actualizar->id_cta_vta) : ?>
                            <option value="<?php echo $cbox_cta_vta->id_dmultitabla ?>" selected>
                              <?php echo $cbox_cta_vta->descripcion; ?>
                            </option>
                          <?php else : ?>
                            <option value="<?php echo $cbox_cta_vta->id_dmultitabla ?>">
                              <?php echo $cbox_cta_vta->descripcion; ?>
                            </option>
                          <?php endif; ?>
                        <?php endforeach; ?>

                      </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Cta ent</label>
                    <div class="col-sm-4">
                      <select class="form-control select2" id="id_cta_ent" style="width: 100%;">

                        <option value="0">Seleccione</option>

                        <?php foreach ($cbox_cta_ent as $cbox_cta_ent) : ?>
                          <?php if ($cbox_cta_ent->id_dmultitabla == $enlace_actualizar->id_cta_ent) : ?>
                            <option value="<?php echo $cbox_cta_ent->id_dmultitabla ?>" selected>
                              <?php echo $cbox_cta_ent->descripcion; ?>
                            </option>
                          <?php else : ?>
                            <option value="<?php echo $cbox_cta_ent->id_dmultitabla ?>">
                              <?php echo $cbox_cta_ent->descripcion; ?>
                            </option>
                          <?php endif; ?>
                        <?php endforeach; ?>

                      </select>
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
    <!-- /.section -->
  </div>
  <!-- /.content-wrapper -->














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

  <script src="<?php echo base_url() ?>application/js/j_productos.js"></script>

  </body>

  </html>