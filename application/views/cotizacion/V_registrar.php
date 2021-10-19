<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cotizacion
            <button type="button" class="btn btn-primary btn-sm" id="registrar_cotizacion">REGISTRAR</button>
            <a href="<?php echo base_url(); ?>C_trabajadores" class="btn btn-danger btn-sm">CANCELAR</a>
          </h1>
        </div>
      </div>
    </div>
  </section>


  <section class="content">

    <div class="container-fluid">


      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Datos Generales</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Detalle Cotizacion</a>
                </li>
              </ul>
            </div>

            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">

                <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <div class="col-md-2">
                          <label for="tipo_trabajador">Serie</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="local"># Cotizacion</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="cargo">Vendedor</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="cargo">Fecha</label>
                          <div class="input-group">
                            <?php
                            date_default_timezone_set("America/Lima");
                            ?>
                            <input type="text" class="form-control" id="" value="<?php echo date("d/m/Y"); ?>" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Datos Cliente/Proveedor</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">

                            <div class="col-md-6">
                              <label for="">Cliente</label>
                              <div class="input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-append">
                                  <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#ven">
                                    Buscar
                                  </button>
                                  <button type="button" class="btn btn-outline-primary  "> <i class="fas fa-user-plus"></i></button>
                                </span>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="">Departamento</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="">
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="">Provincia</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="">
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="">Distrito</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="">Direccion</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1"></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Correo Electronico</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Clausula</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1"></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Lugar Entrega</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-12">
                              <label for="tipo_trabajador">Observacion</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1"></textarea>
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
                      <div class="form-group row">
                        <!--Opcion 1-->
                        <div class="col-md-2">
                          <div class="form-check">
                            <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#opcion_target_producto">
                            </button>
                            <label class="form-check-label">Almacen</label>
                            <div class="modal fade" id="opcion_target_producto" tabindex="-1">
                              <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Productos Almacen - Tableros</h4>
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
                        <!-- Fin Opcion 1 -->

                        <!--Opcion 2-->
                        <div class="col-md-2">
                          <div class="form-check">
                            <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#opcion_target_producto">
                            </button>
                            <label class="form-check-label">Tableros</label>
                            <div class="modal fade" id="opcion_target_producto" tabindex="-1">
                              <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Productos Almacen - Tableros</h4>
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
                        <!-- Fin Opcion 2 -->

                        <!--Opcion 3-->
                        <div class="col-md-2">
                          <div class="form-check">
                            <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#opcion_target_producto">
                            </button>
                            <label class="form-check-label">Comodin</label>
                            <div class="modal fade" id="opcion_target_producto" tabindex="-1">
                              <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Productos Almacen - Tableros</h4>
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
                        <!-- Fin Opcion 3 -->

                        <!-- Producto -->
                        <div class="col-md-6">
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
                            <label class="col-sm-3 col-form-label">Producto</label>
                            <input type="text" class="form-control" id="descripcion_producto" placeholder="Nombre Producto" readonly>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-10">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Descripcion de Productos</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-3">
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
                          <h3 class="card-title">Tipo Cambio</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-12">
                              <label for="">Venta</label>
                              <div class="input-group">
                                <input type="text" class="form-control" value="4.109">
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>




                    <div class="col-md-6">
                      <div class="card collapsed-card">
                        <div class="card-header">
                          <h3 class="card-title">Aplicar Ganancia</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <center>
                              <div class="col-md-12">
                                <div class="input-group">
                                  <label class="col-sm-6 col-form-label">Precio Ganacia</label>
                                  <div class="input-group-prepend">
                                  </div>
                                  <input type="text" class="form-control" id="" readonly>
                                </div>
                              </div>
                            </center>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="tipo_trabajador">G%</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="" placeholder="G%">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label for="local">G. Unidad</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="" placeholder="G. Unidad" readonly>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <label for="cargo">G. Cant/Total</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="" placeholder="G. Cant/Total" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="card collapsed-card">
                        <div class="card-header">
                          <h3 class="card-title">Aplicar Descuento</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <center>
                              <div class="col-md-12">
                                <div class="input-group">
                                  <label class="col-sm-6 col-form-label">Precio Descuento</label>
                                  <div class="input-group-prepend">
                                  </div>
                                  <input type="text" class="form-control" id="" readonly>
                                </div>
                              </div>
                            </center>


                          </div>
                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="tipo_trabajador">G%</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="" placeholder="G%">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label for="local">G. Unidad</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="" placeholder="G. Unidad" readonly>
                              </div>
                            </div>
                            <div class="col-md-5 ">
                              <label for="cargo">G. Cant/Total</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="" placeholder="G. Cant/Total" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>





                    <div class="col-md-12">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Detalle Tablero</h3>
                        </div>
                        <form class="form-horizontal">
                          <div class="card-body" style="overflow-x:auto;">
                            <table id="id_table_detalle_tableros">
                              <thead>
                                <tr>
                                  <th>Almacen</th>
                                  <th>Codigo</th>
                                  <th>Nombre Producto</th>
                                  <th>U.M</th>
                                  <th>Marca</th>
                                  <th>Precio Unitario</th>
                                  <th>Cant Uni</th>
                                  <th>Cant Total</th>
                                  <th>Total</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              </tbody>
                            </table>
                          </div>
                        </form>
                      </div>

                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        <div class="col-md-3">
                          <label for="tipo_trabajador">Precio de Tableros</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="precio_tablero" name="precio_tablero" placeholder="" value="" readonly>
                          </div>
                        </div>
                        <div class="col-md-1">
                          <label for="local">Margen</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="porcentaje_margen" value="" name="porcentaje_margen" placeholder="%">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label for="cargo">Precio de Margen</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="precio_margen" name="precio_margen" readonly>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="sexo">Precio Unitario por Tablero</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="precio_unitario_por_tablero" placeholder="" value="" name="precio_unitario_por_tablero" readonly>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="sexo">Total Tableros</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="total_tablero" placeholder="" value="" name="total_tablero" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
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

<script src="<?php echo base_url() ?>application/js/j_cotizacion.js"></script>

</body>

</html>