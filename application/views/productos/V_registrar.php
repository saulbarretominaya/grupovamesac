  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos
              <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
              <a href="<?php echo base_url(); ?>C_productos" class="btn btn-danger btn-sm">CANCELAR</a>
            </h1>
          </div>
        </div>
      </div>
      <input type="hidden" id="id_trabajador" value="<?php echo $this->session->userdata("id_trabajador") ?>">
      <input type="hidden" id="ds_nombre_trabajador" value="<?php echo $this->session->userdata("ds_nombre_trabajador") ?>">
      <input type="hidden" id="id_producto_empresa" value="<?php echo $this->session->userdata("ds_ruc_empresa") ?>">
      <input type="hidden" id="id_empresa" value="<?php echo $this->session->userdata("id_empresa") ?>">
    </section>

    <section class="content">

      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Dato de Producto</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-3">
                    <label>Codigo</label>
                    <input type="text" class="form-control" id="codigo_producto" name="codigo_producto" readonly="">
                  </div>
                  <div class="col-sm-3">
                    <label>&nbsp;</label><br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="automatico">
                      <label class="form-check-label">Automatico</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="manual">
                      <label class="form-check-label">Manual</label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <label>Almacen</label>
                    <select class="form-control select2" id="id_almacen" style="width: 100%;">
                      <option value="0">Seleccionar</option>
                      <?php foreach ($cbox_almacen as $cbox_almacen) : ?>
                        <option value="<?php echo $cbox_almacen->id_dmultitabla; ?>">
                          <?php echo $cbox_almacen->descripcion; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <label>Unidad Medida</label>
                    <select class="form-select select2" id="id_unidad_medida" style="width: 100%;">
                      <option value="0">Seleccionar</option>
                      <?php foreach ($cbox_unidad_medida as $cbox_unidad_medida) : ?>
                        <option value="<?php echo $cbox_unidad_medida->id_dmultitabla; ?>">
                          <?php echo $cbox_unidad_medida->descripcion; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label>Codigo Sunat</label>
                    <select class="form-control select2" id="id_sunat" style="width: 100%;">
                      <option value="0">Seleccionar</option>
                      <?php foreach ($cbox_codigos_sunat as $cbox_codigos_sunat) : ?>
                        <option value="<?php echo $cbox_codigos_sunat->id_dmultitabla; ?>">
                          <?php echo $cbox_codigos_sunat->descripcion; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label>Nombre Producto</label>
                    <textarea class="form-control" id="descripcion_producto" rows="1"></textarea>
                  </div>
                  <div class="col-sm-2">
                    <label>Stock</label>
                    <input type="text" class="form-control" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Precio de Producto</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-4">
                    <label>Moneda</label>
                    <select class="form-select" id="id_moneda">
                      <option value="0">Seleccionar</option>
                      <?php foreach ($cbox_moneda as $cbox_moneda) : ?>
                        <option value="<?php echo $cbox_moneda->id_dmultitabla; ?>">
                          <?php echo $cbox_moneda->descripcion; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label>Precio Costo</label>
                    <input type="text" class="form-control" id="precio_costo">
                  </div>
                  <div class="col-sm-4">
                    <label>Porcentaje %</label>
                    <input type="text" class="form-control" id="porcentaje" name="porcentaje">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4">
                    <label>G. Unidad</label>
                    <input type="text" class="form-control" id="ganancia_unidad" name="ganancia_unidad" readonly="">
                  </div>
                  <div class="col-sm-4">
                    <label>Precio Unitario</label>
                    <input type="text" class="form-control" id="precio_unitario" name="precio_unitario" readonly="">
                  </div>
                  <div class="col-sm-4">
                    <label>Rentabilidad %</label>
                    <input type="text" class="form-control" id="rentabilidad" name="rentabilidad" readonly="">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Caracteristica del Producto</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-4">
                    <label>Grupo</label>
                    <select class="form-select select2" id="id_grupo" style="width: 100%;">
                      <option value="0">Seleccionar</option>
                      <?php foreach ($cbox_grupo as $cbox_grupo) : ?>
                        <option value="<?php echo $cbox_grupo->id_dmultitabla; ?>">
                          <?php echo $cbox_grupo->descripcion; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="col-sm-4">
                    <label>Familia</label>
                    <select class="form-select select2" id="id_familia" style="width: 100%;">
                      <option value="0">Seleccionar</option>
                      <?php foreach ($cbox_familia as $cbox_familia) : ?>
                        <option value="<?php echo $cbox_familia->id_dmultitabla; ?>">
                          <?php echo $cbox_familia->descripcion; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="col-sm-4">
                    <label>Clase</label>
                    <select class="form-select select2" id="id_clase" style="width: 100%;">
                      <option value="0">Seleccionar</option>
                      <?php foreach ($cbox_clase as $cbox_clase) : ?>
                        <option value="<?php echo $cbox_clase->id_dmultitabla; ?>">
                          <?php echo $cbox_clase->descripcion; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4">
                    <label>Sub Clase</label>
                    <select class="form-select select2" id="id_sub_clase" style="width: 100%;">
                      <option value="0">Seleccionar</option>
                      <?php foreach ($cbox_sub_clase as $cbox_sub_clase) : ?>
                        <option value="<?php echo $cbox_sub_clase->id_dmultitabla; ?>">
                          <?php echo $cbox_sub_clase->descripcion; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label>Sub Clase 2</label>
                    <select class="form-select select2" id="id_sub_clase_dos" style="width: 100%;">
                      <option value="0">Seleccionar</option>
                      <?php foreach ($cbox_sub_clase_dos as $cbox_sub_clase_dos) : ?>
                        <option value="<?php echo $cbox_sub_clase_dos->id_dmultitabla; ?>">
                          <?php echo $cbox_sub_clase_dos->descripcion; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label>Marca Producto</label>
                    <select class="form-control select2" id="id_marca_producto" style="width: 100%;">
                      <option value="0">Seleccionar</option>
                      <?php foreach ($cbox_marca_productos as $cbox_marca_productos) : ?>
                        <option value="<?php echo $cbox_marca_productos->id_dmultitabla; ?>">
                          <?php echo $cbox_marca_productos->descripcion; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Datos Cuentas Sunat</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label>Cta vta</label>
                    <select class="form-select select2" id="id_cta_vta">
                      <option value="0">Seleccionar</option>
                      <?php foreach ($cbox_cta_vta as $cbox_cta_vta) : ?>
                        <option value="<?php echo $cbox_cta_vta->id_dmultitabla; ?>">
                          <?php echo $cbox_cta_vta->descripcion; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label>Cta ent</label>
                    <select class="form-select select2" id="id_cta_ent">
                      <option value="0">Seleccionar</option>
                      <?php foreach ($cbox_cta_ent as $cbox_cta_ent) : ?>
                        <option value="<?php echo $cbox_cta_ent->id_dmultitabla; ?>">
                          <?php echo $cbox_cta_ent->descripcion; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>






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