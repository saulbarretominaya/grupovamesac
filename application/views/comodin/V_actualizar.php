  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Comodin
              <button type="button" class="btn btn-warning btn-sm" id="actualizar">ACTUALIZAR</button>
              <a href="<?php echo base_url(); ?>C_comodin" class="btn btn-danger btn-sm">CANCELAR</a>
            </h1>
          </div>
        </div>
      </div>
      <input type="hidden" id="id_actualizar" value="ACTUALIZAR">


    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Registro de comodin</h3>
              </div>
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">

                    <div class="col-sm-3">
                      <label>Categoria</label>
                      <select class="form-control select2" id="id_categoria_comodin" style="width: 100%;">
                        <option value="0">Seleccionar</option>
                        <?php foreach ($cbox_categoria_comodin as $cbox_categoria_comodin) : ?>
                          <?php if ($cbox_categoria_comodin->id_dmultitabla == $enlace_actualizar->id_categoria_comodin) : ?>
                            <option value="<?php echo $cbox_categoria_comodin->id_dmultitabla; ?>" selected><?php echo $cbox_categoria_comodin->descripcion; ?></option>
                          <?php else : ?>
                            <option value="<?php echo $cbox_categoria_comodin->id_dmultitabla ?>"><?php echo $cbox_categoria_comodin->descripcion; ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="col-sm-3">
                      <label>Codigo Producto</label>
                      <input type="hidden" id="id_comodin" value="<?php echo $enlace_actualizar->id_comodin ?>">
                      <input type="text" class="form-control" id="codigo_producto" value="<?php echo $enlace_actualizar->codigo_producto ?>">
                    </div>
                    <div class="col-sm-3">
                      <label>Nombre Producto</label>
                      <textarea class="form-control" rows="1" id="descripcion_producto"><?php echo $enlace_actualizar->descripcion_producto ?></textarea>
                    </div>
                    <div class="col-sm-3">
                      <label>Proveedor</label>
                      <input type="text" class="form-control" id="nombre_proveedor" value="<?php echo $enlace_actualizar->nombre_proveedor ?>">
                    </div>

                  </div>
                  <div class="form-group row">
                    <div class="col-sm-3">
                      <label>Marca</label>
                      <select class="form-control select2" id="id_marca_producto" style="width: 100%;">
                        <option value="0">Seleccionar</option>
                        <?php foreach ($cbox_marca_productos as $cbox_marca_productos) : ?>
                          <?php if ($cbox_marca_productos->id_dmultitabla == $enlace_actualizar->id_marca_producto) : ?>
                            <option value="<?php echo $cbox_marca_productos->id_dmultitabla; ?>" selected>
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
                    <div class="col-sm-3">
                      <label>U.M</label>
                      <select class="form-control select2" id="id_unidad_medida" style="width: 100%;">
                        <option value="0">Seleccionar</option>
                        <?php foreach ($cbox_unidad_medida as $cbox_unidad_medida) : ?>
                          <?php if ($cbox_unidad_medida->id_dmultitabla == $enlace_actualizar->id_unidad_medida) : ?>
                            <option value="<?php echo $cbox_unidad_medida->id_dmultitabla; ?>" selected>
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
                    <div class="col-sm-3">
                      <label>Moneda</label>
                      <select class="form-control select2" id="id_moneda">
                        <option value="0">Seleccionar</option>
                        <?php foreach ($cbox_moneda as $cbox_moneda) : ?>
                          <?php if ($cbox_moneda->id_dmultitabla == $enlace_actualizar->id_moneda) : ?>
                            <option value="<?php echo $cbox_moneda->id_dmultitabla; ?>" selected>
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
                    <div class="col-sm-3">
                      <label>Precio</label>
                      <input type="text" class="form-control" id="precio_unitario" value="<?php echo $enlace_actualizar->precio_unitario ?>">
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>












  <!-- Control Sidebar -->
  <aside class=" control-sidebar control-sidebar-dark">
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

  <script src="<?php echo base_url() ?>application/js/j_comodin.js"></script>

  </body>

  </html>