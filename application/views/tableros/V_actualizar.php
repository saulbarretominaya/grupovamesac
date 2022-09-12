  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tableros
              <button type="button" class="btn btn-warning btn-sm" id="actualizar">ACTUALIZAR</button>
              <a href="<?php echo base_url(); ?>C_tableros" class="btn btn-danger btn-sm">CANCELAR</a>
            </h1>
          </div>
        </div>
      </div>
      <input type="hidden" id="id_trabajador" value="<?php echo $this->session->userdata("id_trabajador") ?>">
      <input type="hidden" id="ds_nombre_trabajador" value="<?php echo $this->session->userdata("ds_nombre_trabajador") ?>">
      <input type="hidden" id="id_tablero_empresa" value="<?php echo $this->session->userdata("ds_ruc_empresa") ?>">
      <input type="hidden" id="id_empresa" value="<?php echo $this->session->userdata("id_empresa") ?>">
      <input type="hidden" id="id_tablero" value="<?php echo $enlace_actualizar_cabecera->id_tablero ?>">
      <table id="container_id_dtablero_eliminar" style="display: none;">
        <tbody>
        </tbody>
      </table>
      <table id="container_id_dtablero_actualizar" style="display: none;">
        <tbody>
        </tbody>
      </table>
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
                              <div class="col-md-2">
                                <label for="">Codigo Tablero</label>
                                <div class="input-group">
                                  <textarea class="form-control" id="codigo_tablero" rows="1"><?php echo $enlace_actualizar_cabecera->codigo_tablero ?></textarea>
                                </div>
                              </div>
                              <!-- Codigos Sunat< -->
                              <div class="col-md-4">
                                <label for="">Codigo Sunat</label>
                                <div class="input-group">
                                  <select class="form-control select2" id="id_sunat" style="width: 100%;">
                                    <option value="0">Seleccionar</option>

                                    <?php foreach ($cbox_codigos_sunat as $cbox_codigos_sunat) : ?>
                                      <?php if ($cbox_codigos_sunat->id_dmultitabla == $enlace_actualizar_cabecera->id_sunat) : ?>
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

                              <div class="col-md-4">
                                <label>Descripcion Tablero</label>
                                <div class="input-group">
                                  <textarea class="form-control" id="descripcion_tablero" rows="1"><?php echo $enlace_actualizar_cabecera->descripcion_tablero ?></textarea>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <label>Adicional</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="adicional" value="<?php echo $enlace_actualizar_cabecera->adicional ?>" name="adicional">
                                </div>
                              </div>

                            </div>


                            <div class="form-group row">
                              <!-- Marca Tablero -->
                              <div class="col-md-3">
                                <label for="">Marca Tablero</label>
                                <div class="input-group">
                                  <select class="form-control select2" id="id_marca_tablero" style="width: 100%;">
                                    <option value="0">Seleccionar</option>

                                    <?php foreach ($cbox_marca_tableros as $cbox_marca_tableros) : ?>
                                      <?php if ($cbox_marca_tableros->id_dmultitabla == $enlace_actualizar_cabecera->id_marca_tablero) : ?>
                                        <option value="<?php echo $cbox_marca_tableros->id_dmultitabla ?>" selected>
                                          <?php echo $cbox_marca_tableros->descripcion; ?>
                                        </option>
                                      <?php else : ?>
                                        <option value="<?php echo $cbox_marca_tableros->id_dmultitabla ?>">
                                          <?php echo $cbox_marca_tableros->descripcion; ?>
                                        </option>
                                      <?php endif; ?>
                                    <?php endforeach; ?>

                                  </select>





                                </div>
                              </div>
                              <div class="col-md-3">
                                <label for="">Modelo Tablero</label>
                                <div class="input-group">
                                  <select class="form-control select2" id="id_modelo_tablero" style="width: 100%;">
                                    <option value="0">Seleccionar</option>

                                    <?php foreach ($cbox_modelo_tableros as $cbox_modelo_tableros) : ?>
                                      <?php if ($cbox_modelo_tableros->id_dmultitabla == $enlace_actualizar_cabecera->id_modelo_tablero) : ?>
                                        <option value="<?php echo $cbox_modelo_tableros->id_dmultitabla ?>" selected>
                                          <?php echo $cbox_modelo_tableros->descripcion; ?>
                                        </option>
                                      <?php else : ?>
                                        <option value="<?php echo $cbox_modelo_tableros->id_dmultitabla ?>">
                                          <?php echo $cbox_modelo_tableros->descripcion; ?>
                                        </option>
                                      <?php endif; ?>
                                    <?php endforeach; ?>


                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <label for="">Almacen</label>
                                <div class="input-group">
                                  <select class="form-control select2" id="id_almacen" style="width: 100%;">
                                    <option value="0">Seleccionar</option>

                                    <?php foreach ($cbox_almacen as $cbox_almacen) : ?>
                                      <?php if ($cbox_almacen->id_dmultitabla == $enlace_actualizar_cabecera->id_almacen) : ?>
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

                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                    <div class="row">

                      <div class="col-md-12">
                        <!-- Primera Fila -->
                        <div class="form-group row">
                          <!-- Producto-->
                          <div class="col-md-2">
                            <div class="form-check">
                              <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#opcion_target_producto">
                              </button>
                              <label class="form-check-label">Productos</label>
                              <div class="modal fade" id="opcion_target_producto" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Productos</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <table id="id_datatable_productos" class="table table-bordered table-sm table-hover table-responsive">
                                        <thead>
                                          <tr>
                                            <th></th>
                                            <th id="dtable_ds_almacen">Almacen</th>
                                            <th id="dtable_codigo">Codigo</th>
                                            <th id="dtable_descripcion_producto">Nombre del Producto</th>
                                            <th id="dtable_ds_unidad_medida">U.M</th>
                                            <th id="dtable_ds_marca_producto">Marca</th>
                                            <th id="dtable_ds_grupo">Grupo</th>
                                            <th id="dtable_stock">Stock</th>
                                            <th id="dtable_ds_moneda">Moneda</th>
                                            <th id="dtable_precio_unitario">Precio Unitario</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php if (!empty($index_productos)) : ?>
                                            <?php foreach ($index_productos as $index_productos) : ?>
                                              <tr>
                                                <td>
                                                  <?php $split_productos =
                                                    $index_productos->id_almacen . "*" .
                                                    $index_productos->ds_almacen . "*" .
                                                    $index_productos->id_producto . "*" .
                                                    $index_productos->codigo_producto . "*" .
                                                    $index_productos->descripcion_producto . "*" .
                                                    $index_productos->id_unidad_medida . "*" .
                                                    $index_productos->ds_unidad_medida . "*" .
                                                    $index_productos->id_marca_producto . "*" .
                                                    $index_productos->ds_marca_producto . "*" .
                                                    $index_productos->ds_moneda . "*" .
                                                    $index_productos->precio_unitario;

                                                  ?>
                                                  <button type="button" class="btn btn-outline-success btn-sm js_seleccionar_modal_producto" value="<?php echo $split_productos; ?>" data-toggle="modal" data-target="#opcion_target_producto"><span class="fas fa-check"></span></button>
                                                </td>
                                                <td><?php echo $index_productos->ds_almacen; ?></td>
                                                <td><?php echo $index_productos->codigo_producto; ?></td>
                                                <td><?php echo $index_productos->descripcion_producto; ?></td>
                                                <td><?php echo $index_productos->ds_unidad_medida; ?></td>
                                                <td><?php echo $index_productos->ds_marca_producto; ?></td>
                                                <td><?php echo $index_productos->ds_grupo; ?></td>
                                                <td><?php echo $index_productos->stock; ?></td>
                                                <td><?php echo $index_productos->ds_moneda; ?></td>
                                                <td><?php echo $index_productos->precio_unitario; ?></td>
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
                          <!-- Fin Producto -->
                          <!-- Comodin -->
                          <!-- <div class="col-md-2">
                            <div class="form-check">
                              <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#opcion_target_comodin" id="btn_id_comodin">
                              </button>
                              <label class="form-check-label">Comodin</label>
                              <div class="modal fade" id="opcion_target_comodin" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Comodin</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <table id="id_datatable_comodin" class="table table-bordered table-sm table-hover table-responsive">
                                        <thead>
                                          <tr>
                                            <th></th>
                                            <th id="dtable_comodin_codigo_producto">Codigo Producto</th>
                                            <th id="dtable_comodin_nombre_producto">Nombre del Producto</th>
                                            <th id="dtable_comodin_ds_unidad_medida">U.M</th>
                                            <th id="dtable_comodin_ds_marca_producto">Marca</th>
                                            <th id="dtable_comodin_ds_moneda">Moneda</th>
                                            <th id="dtable_comodin_precio_unitario">Precio Unitario</th>
                                            <th id="dtable_comodin_nombre_proveedor">Nombre Proveedor</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php if (!empty($index_comodin)) : ?>
                                            <?php foreach ($index_comodin as $index_comodin) : ?>
                                              <tr>
                                                <td>
                                                  <?php $split_comodin =
                                                    $index_comodin->id_comodin . "*" .
                                                    $index_comodin->id_general . "*" .
                                                    $index_comodin->codigo_producto . "*" .
                                                    $index_comodin->descripcion_producto . "*" .
                                                    $index_comodin->id_unidad_medida . "*" .
                                                    $index_comodin->ds_unidad_medida . "*" .
                                                    $index_comodin->id_marca_producto . "*" .
                                                    $index_comodin->ds_marca_producto . "*" .
                                                    $index_comodin->id_moneda . "*" .
                                                    $index_comodin->ds_moneda . "*" .
                                                    $index_comodin->precio_unitario;
                                                  ?>
                                                  <button type="button" class="btn btn-outline-success btn-sm js_seleccionar_modal_comodin" value="<?php echo $split_comodin; ?>" data-toggle="modal" data-target="#opcion_target_comodin"><span class="fas fa-check"></span></button>
                                                </td>
                                                <td><?php echo $index_comodin->codigo_producto; ?></td>
                                                <td><?php echo $index_comodin->descripcion_producto; ?></td>
                                                <td><?php echo $index_comodin->ds_unidad_medida; ?></td>
                                                <td><?php echo $index_comodin->ds_marca_producto; ?></td>
                                                <td><?php echo $index_comodin->ds_moneda; ?></td>
                                                <td><?php echo $index_comodin->precio_unitario; ?></td>
                                                <td><?php echo $index_comodin->nombre_proveedor; ?></td>
                                              </tr>
                                            <?php endforeach; ?>
                                          <?php endif; ?>
                                        </tbody>
                                      </table>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> -->
                          <!-- Fin Comodin -->
                          <div class="col-md-8">
                            <input type="hidden" id="hidden_item">
                            <input type="hidden" id="hidden_id_almacen">
                            <input type="hidden" id="hidden_ds_almacen">
                            <input type="hidden" id="hidden_id_producto">
                            <input type="hidden" id="hidden_codigo_producto">
                            <!-- <input type="hidden" id="descripcion_producto"> -->
                            <input type="hidden" id="hidden_id_unidad_medida">
                            <input type="hidden" id="hidden_ds_unidad_medida">
                            <input type="hidden" id="hidden_id_marca_producto">
                            <input type="hidden" id="hidden_ds_marca_producto">
                            <!-- <input type="hidden" id="precio_unitario"> -->
                            <!-- <input type="hidden" id="cantidad_unitaria"> -->
                            <input type="hidden" id="hidden_cantidad_total_producto" name="hidden_cantidad_total_producto">
                            <input type="hidden" id="hidden_monto_total_producto" name="hidden_monto_total_producto">
                            <div class="input-group">
                              <label class="col-sm-3 col-form-label">Descripcion</label>
                              <input type="text" class="form-control" id="descripcion_producto" placeholder="Descripcion Producto" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-10">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Descripcion de Producto por Tablero</h3>
                          </div>
                          <div class="card-body">
                            <div class="form-group row">
                              <div class="col-md-1">
                                <label for="">&nbsp;</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="simbolo_moneda" value="" readonly>
                                  <input type="hidden" id="moneda">
                                </div>
                              </div>
                              <div class="col-md-2">
                                <label for="">Precio Unitario</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="precio_unitario" placeholder="" readonly>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <label for="">Cantidad</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="cantidad_unitaria" placeholder="">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <label for="">Monto</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" name="monto_item" id="monto_item" placeholder="" readonly>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <label for="">Moneda</label>
                                <div class="input-group">
                                  <select class="form-select" id="id_moneda" disabled>
                                    <option value="0">Seleccionar</option>

                                    <?php foreach ($cbox_moneda as $cbox_moneda) : ?>
                                      <?php if ($cbox_moneda->id_dmultitabla == $enlace_actualizar_cabecera->id_moneda) : ?>
                                        <option value="<?php echo $cbox_moneda->id_dmultitabla ?>" selected><?php echo $cbox_moneda->descripcion; ?></option>
                                      <?php else : ?>
                                        <option value="<?php echo $cbox_moneda->id_dmultitabla ?>"><?php echo $cbox_moneda->descripcion; ?></option>
                                      <?php endif; ?>
                                    <?php endforeach; ?>

                                  </select>
                                </div>
                              </div>
                              <div class="col-md-1">
                                <label for="">&nbsp;</label>
                                <div class="input-group">
                                  <button type="button" class="btn btn-outline-success" id="id_agregar_tablero"><span class="fas fa-plus"></span></button>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Cant Tablero</h3>
                          </div>
                          <div class="card-body">
                            <div class="form-group row">
                              <div class="col-md-12">
                                <label for="">&nbsp;</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" name="" id="cantidad_tablero" placeholder="" value="<?php echo $enlace_actualizar_cabecera->cantidad_tablero ?>" readonly>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Detalle Tablero</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form class="form-horizontal">
                            <div class="card-body" style="overflow-x:auto;">
                              <table id="id_table_detalle_tableros">
                                <thead>
                                  <tr>
                                    <th>Item</th>
                                    <th>Almacen</th>
                                    <th>Codigo</th>
                                    <th>Descripcion</th>
                                    <th>U.M</th>
                                    <th>Marca</th>
                                    <th>Precio Unitario</th>
                                    <th>Cant Unitario</th>
                                    <th>Cant Total</th>
                                    <th>Total</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($enlace_actualizar_detalle as $index) : ?>
                                    <tr>
                                      <input type="hidden" id="id_dtablero" value="<?php echo $index->id_dtablero; ?>">
                                      <td width='70px'><input type='text' value='<?php echo $index->item; ?>' class='form-control' id='item' readonly=''></td>
                                      <td><?php echo $index->ds_almacen; ?></td>
                                      <td><?php echo $index->codigo_producto; ?></td>
                                      <td><?php echo $index->descripcion_producto; ?></td>
                                      <td><?php echo $index->ds_unidad_medida; ?></td>
                                      <td><?php echo $index->ds_marca_producto; ?></td>
                                      <td><?php echo $index->precio_unitario; ?></td>
                                      <td><?php echo $index->cantidad_unitaria; ?></td>
                                      <td><?php echo $index->cantidad_total_producto; ?></td>
                                      <td><?php echo $index->monto_total_producto; ?></td>
                                      <td>
                                        <button type="button" class="btn btn-outline-danger class_eliminar_detalle"><span class="far fa-trash-alt"></span></button>
                                      </td>
                                    </tr>
                                  <?php endforeach; ?>
                                </tbody>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </form>
                        </div>
                        <!-- /.card -->

                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <!-- Precio Tablero -->
                          <div class="col-md-3">
                            <label for="tipo_trabajador">Precio Componentes</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="precio_tablero" name="precio_tablero" placeholder="" value="<?php echo $enlace_actualizar_cabecera->precio_tablero ?>" readonly>
                            </div>
                          </div>
                          <!--  -->
                          <div class="col-md-1">
                            <label for="local">Margen</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="porcentaje_margen" value="<?php echo $enlace_actualizar_cabecera->porcentaje_margen ?>" name="porcentaje_margen" placeholder="%">

                            </div>
                          </div>
                          <!--  -->
                          <div class="col-md-2">
                            <label for="cargo">Precio de Margen</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="precio_margen" name="precio_margen" value="<?php echo $enlace_actualizar_cabecera->precio_margen ?>" readonly>

                            </div>
                          </div>
                          <!--  -->
                          <div class="col-md-3">
                            <label for="sexo">Precio Unitario por Tablero</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="precio_unitario_por_tablero" placeholder="" value="<?php echo $enlace_actualizar_cabecera->precio_unitario_por_tablero ?>" name="precio_unitario_por_tablero" readonly>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <label for="sexo">Total Tableros</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="total_tablero" placeholder="" value="<?php echo $enlace_actualizar_cabecera->total_tablero ?>" name="total_tablero" readonly>
                            </div>
                          </div>
                        </div>
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
  <script src="<?php echo base_url() ?>plantilla/plugins/bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>


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