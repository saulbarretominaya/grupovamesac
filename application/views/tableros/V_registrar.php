  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tableros
              <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
              <a href="<?php echo base_url(); ?>C_tableros" class="btn btn-danger btn-sm">CANCELAR</a>
            </h1>
          </div>
        </div>
      </div>
    </section>


    <section class="content">

      <div class="container-fluid">

        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Datos Generales</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Detalle Tableros</a>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">

                  <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                    <div class="row">

                      <div class="col-md-12">
                        <!-- Primer Card -->
                        <div class="card card-info">
                          <div class="card-body">

                            <div class="form-group row">
                              <!-- Codigo Tablero -->
                              <div class="col-md-5">
                                <div class="input-group">
                                  <label class="col-sm-4 col-form-label">Codigo Tablero</label>
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""> <i class="fas fa-user-shield"></i> </span>
                                  </div>
                                  <input type="text" class="form-control" id="codigo_tablero" placeholder="Codigo Tablero" value="">
                                </div>
                              </div>
                              <!-- Codigos Sunat< -->
                              <div class="col-md-7">
                                <div class="input-group">
                                  <label class="col-sm-3 col-form-label">Codigo Sunat</label>
                                  <div class="col-md-8">
                                    <select class="form-control select2" id="id_sunat" style="width: 100%;">
                                      <option value="0">Seleccione</option>
                                      <?php foreach ($cbox_codigos_sunat as $cbox_codigos_sunat) : ?>
                                        <option value="<?php echo $cbox_codigos_sunat->id_dmultitabla; ?>">
                                          <?php echo $cbox_codigos_sunat->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                              </div>

                            </div>

                            <div class="form-group row">
                              <!-- Descricpion Tablero -->
                              <div class="col-md-12">
                                <div class="input-group">
                                  <label class="col-sm-12 col-form-label">Descripcion Tablero</label>
                                  <textarea class="form-control" id="descripcion_tablero" rows="2"></textarea>
                                </div>
                              </div>

                            </div>

                            <div class="form-group row">
                              <!-- Marca Tablero -->
                              <div class="col-md-3 mb-3">
                                <label for="tipo_trabajador">Marca Tablero</label>
                                <div class="input-group">
                                  <select class="form-control select2" id="id_marca_tablero" style="width: 100%;">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($cbox_marca_tableros as $cbox_marca_tableros) : ?>
                                      <option value="<?php echo $cbox_marca_tableros->id_dmultitabla; ?>">
                                        <?php echo $cbox_marca_tableros->descripcion; ?>
                                      </option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                              <!-- Modelo Tablero -->
                              <div class="col-md-3 mb-3">
                                <label for="local">Modelo Tablero</label>
                                <div class="input-group">
                                  <select class="form-control select2" id="id_modelo_tablero" style="width: 100%;">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($cbox_modelo_tableros as $cbox_modelo_tableros) : ?>
                                      <option value="<?php echo $cbox_modelo_tableros->id_dmultitabla; ?>">
                                        <?php echo $cbox_modelo_tableros->descripcion; ?>
                                      </option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                              <!-- Tipo Moneda -->
                              <div class="col-md-3 mb-3">
                                <label for="cargo">Tipo Moneda</label>
                                <div class="input-group">
                                  <select class="form-control select2" id="id_moneda" style="width: 100%;">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($cbox_moneda as $cbox_moneda) : ?>
                                      <option value="<?php echo $cbox_moneda->id_dmultitabla; ?>">
                                        <?php echo $cbox_moneda->descripcion; ?>
                                      </option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                              <!-- Almacen -->
                              <div class="col-md-3 mb-3">
                                <label for="sexo">Almacen</label>
                                <div class="input-group">
                                  <select class="form-control select2" id="id_almacen" style="width: 100%;">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($cbox_almacen as $cbox_almacen) : ?>
                                      <option value="<?php echo $cbox_almacen->id_dmultitabla; ?>">
                                        <?php echo $cbox_almacen->descripcion; ?>
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

                  </div>

                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                    <div class="row">

                      <div class="col-md-12">
                        <!-- Primer Card -->
                        <div class="card card-secondary">
                          <!-- <div class="card-header">
                            <h3 class="card-title">XXXXXX</h3>
                          </div> -->
                          <div class="card-body">
                            <!-- Primera Fila -->
                            <div class="form-group row">

                              <!-- Inicio Modal -->
                              <div class="col-md-3">
                                <div class="form-check">
                                  <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#id_target_producto">
                                  </button>
                                  <label class="form-check-label">Productos Almacen</label>
                                  <div class="modal fade" id="id_target_producto" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Productos Almacen</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <table id="id_datatable_productos" class="display nowrap table-responsive">
                                            <thead>
                                              <tr>
                                                <th></th>
                                                <th id="dtable_ds_almacen">Almacen</th>
                                                <th id="dtable_codigo">Codigo</th>
                                                <th id="dtable_descripcion_producto">Nombre Producto</th>
                                                <th id="dtable_ds_unidad_medida">U.M</th>
                                                <th id="dtable_ds_marca_producto">Marca</th>
                                                <th id="dtable_ds_grupo">Grupo</th>
                                                <th id="dtable_ds_moneda">Moneda</th>
                                                <th id="dtable_precio_venta">Precio venta</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php if (!empty($index_productos)) : ?>
                                                <?php foreach ($index_productos as $index_productos) : ?>
                                                  <tr>
                                                    <td>
                                                      <?php $split_productos =
                                                        $index_productos->ds_almacen . "*" .
                                                        $index_productos->codigo_producto . "*" .
                                                        $index_productos->descripcion_producto . "*" .
                                                        $index_productos->ds_unidad_medida . "*" .
                                                        $index_productos->ds_marca_producto . "*" .
                                                        $index_productos->precio_venta . "*" .
                                                        $index_productos->id_producto;
                                                      ?>
                                                      <button type="button" class="btn btn-info btn-check btn-xs" value="<?php echo $split_productos; ?>"><span class="fa fa-check"></span></button>
                                                    </td>
                                                    <td><?php echo $index_productos->ds_almacen; ?></td>
                                                    <td><?php echo $index_productos->codigo_producto; ?></td>
                                                    <td><?php echo $index_productos->descripcion_producto; ?></td>
                                                    <td><?php echo $index_productos->ds_unidad_medida; ?></td>
                                                    <td><?php echo $index_productos->ds_marca_producto; ?></td>
                                                    <td><?php echo $index_productos->ds_grupo; ?></td>
                                                    <td><?php echo $index_productos->ds_moneda; ?></td>
                                                    <td><?php echo $index_productos->precio_venta; ?></td>
                                                  </tr>
                                                <?php endforeach; ?>
                                              <?php endif; ?>
                                            </tbody>
                                          </table>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                                </div>
                              </div>
                              <!-- Fin de Modal -->
                            </div>

                            <div class="form-group row">
                              <!-- Producto -->
                              <div class="col-md-4">
                                <div class="input-group">
                                  <label class="col-sm-4 col-form-label">Producto</label>
                                  <input type="hidden" id="hidden_ds_almacen">
                                  <input type="hidden" id="hidden_codigo_producto">
                                  <input type="hidden" id="hidden_ds_unidad_medida">
                                  <input type="hidden" id="hidden_ds_marca_producto">
                                  <input type="hidden" id="hidden_id_producto">
                                  <input type="text" class="form-control" id="descripcion_producto" placeholder="Nombre Producto" readonly>
                                </div>
                              </div>
                              <!-- Precio -->
                              <div class="col-md-3">
                                <div class="input-group">
                                  <label class="col-sm-4 col-form-label">Precio</label>
                                  <input type="text" class="form-control" id="precio_venta" placeholder="Precio" readonly>
                                </div>
                              </div>
                              <!-- Stock -->
                              <div class="col-md-2">
                                <div class="input-group">
                                  <label class="col-sm-5 col-form-label">Stock</label>
                                  <input type="text" class="form-control" id="" placeholder="Stock" readonly>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="input-group">
                                  <label class="col-sm-7 col-form-label">Cantidad</label>
                                  <input type="text" class="form-control" id="cantidad" placeholder="">
                                </div>
                              </div>
                              <div class="col-md-1">
                                <button type="button" class="btn btn-primary" id="id_agregar_tablero">+</button>
                              </div>

                            </div>

                            <div class="form-group row">
                              <!-- Precio Costo -->
                              <div class="col-md-3 mb-3">
                                <label for="tipo_trabajador">Precio Costo</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="xxxxx" placeholder="" value="">
                                </div>
                              </div>
                              <!--  -->
                              <div class="col-md-3 mb-3">
                                <label for="local">Porcentaje</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="yyyyyy" placeholder="" value="">

                                </div>
                              </div>
                              <!--  -->
                              <div class="col-md-3 mb-3">
                                <label for="cargo">Precio Venta</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="xxxx" placeholder="" value="">

                                </div>
                              </div>
                              <!--  -->
                              <div class="col-md-3 mb-3">
                                <label for="sexo">Rentabilidad</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="xx" placeholder="" value="">

                                </div>
                              </div>

                            </div>

                          </div>
                        </div>
                      </div>

                      <!-- Detalle -->
                      <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="card card-warning">
                          <div class="card-header">
                            <h3 class="card-title">Detalle Tablero</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form class="form-horizontal">
                            <div class="card-body">
                              <table id="id_table_detalle_tableros" class="table table-sm table-hover">
                                <thead>
                                  <tr>
                                    <th>Item</th>
                                    <th>Almacen</th>
                                    <th>Codigo Producto</th>
                                    <th>Nombre Producto</th>
                                    <th>Unid Medida</th>
                                    <th>Marca</th>
                                    <th>Cant</th>
                                    <th>Precio Unitario</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
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
                  </div>
                </div>
              </div>
              <!-- /.card -->
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

  <script src="<?php echo base_url() ?>application/js/j_tableros.js"></script>

  </body>

  </html>