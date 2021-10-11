  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pre guia
              <button type="button" class="btn btn-primary btn-sm" id="registrar_cotizacion">REGISTRAR</button>
              <a href="<?php echo base_url(); ?>C_trabajadores" class="btn btn-danger btn-sm">CANCELAR</a>
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Detalle Cotizacion</a>
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
                          <!-- <div class="card-header">
                          <h3 class="card-title">Informacion Definir</h3>
                        </div> -->
                          <div class="card-body">

                            <div class="form-group row">
                              <!-- Serie -->
                              <div class="col-md-2">
                                <div class="input-group">
                                  <!-- <label class="col-sm-3 col-form-label">Serie</label> -->
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""> <i class="fas fa-user-shield"></i> </span>
                                  </div>
                                  <input type="text" class="form-control" id="" placeholder="Serie" value="" readonly placeholder="Serie">
                                </div>
                              </div>
                              <!-- Num. Cotizacion -->
                              <div class="col-md-3">
                                <div class="input-group">
                                  <!-- <label class="col-sm-5 col-form-label">Num Cotizacion</label> -->
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""> <i class="fas fa-user-shield"></i> </span>
                                  </div>
                                  <input type="text" class="form-control" id="" placeholder="# Cot Automatico" readonly>
                                </div>
                              </div>
                              <!-- Vendedor -->
                              <div class="col-md-5">
                                <div class="input-group">
                                  <!-- <label class="col-sm-3 col-form-label">Vendedor</label> -->
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""> <i class="fas fa-user-shield"></i> </span>
                                  </div>
                                  <input type="text" class="form-control" id="" placeholder="Nombre Vendedor" readonly>
                                </div>
                              </div>
                              <!-- Fecha -->
                              <div class="col-md-2">
                                <div class="input-group">
                                  <!-- <label class="col-sm-3 col-form-label">Fecha</label> -->
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="far fa-calendar-alt"></i> </span>
                                  </div>
                                  <?php
                                  date_default_timezone_set("America/Lima");
                                  ?>
                                  <input type="text" class="form-control" id="" value="<?php echo date("d/m/Y"); ?>" readonly>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>

                        <!-- Segundo Card -->
                        <div class="card card-info">
                          <div class="card-header">
                            <h3 class="card-title">Datos Cliente/Proveedor</h3>
                          </div>
                          <div class="card-body">

                            <!-- Primera Fila -->
                            <div class="form-group row">
                              <!-- Cliente -->
                              <div class="col-md-6">
                                <div class="input-group">
                                  <label class="col-sm-3 col-form-label">Cliente</label>
                                  <input type="text" class="form-control" placeholder="Cliente" readonly>
                                  <span class="input-group-append">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#ven">
                                      Buscar
                                    </button>
                                    <button type="button" class="btn btn-success"> <i class="fas fa-user-plus"></i></button>
                                  </span>


                                  <div class="modal fade" id="ven" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Large Modal</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>One fine body&hellip;</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                                </div>
                              </div>
                              <!-- Validez Oferta -->
                              <div class="col-md-4">
                                <div class="input-group">
                                  <label class="col-sm-6 col-form-label">Validez de oferta </label>
                                  <input type="text" class="form-control" id="validez_oferta" placeholder="#">
                                </div>
                              </div>

                            </div>
                            <!-- Segunda Fila -->
                            <div class="form-group row">
                              <!-- Direccion -->
                              <div class="col-md-6">
                                <div class="input-group">
                                  <label class="col-sm-3 col-form-label">Direccion</label>
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""> <i class="fas fa-user-shield"></i> </span>
                                  </div>
                                  <input type="text" class="form-control" id="direccion" placeholder="Direccion" readonly>
                                </div>
                              </div>
                              <!-- Lugar de Entrega -->
                              <div class="col-md-6">
                                <div class="input-group">
                                  <label class="col-sm-4 col-form-label">Lugar de Entrega</label>
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""> <i class="fas fa-user-shield"></i> </span>
                                  </div>
                                  <input type="text" class="form-control" id="lugar_entrega" placeholder="Lugar de Entrega">
                                </div>
                              </div>
                            </div>
                            <!-- Tercera Fila -->
                            <div class="form-group row">
                              <!-- Clausula -->
                              <div class="col-md-6">
                                <div class="input-group">
                                  <label class="col-sm-3 col-form-label">Clausula</label>
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""> <i class="fas fa-user-shield"></i> </span>
                                  </div>
                                  <input type="text" class="form-control" id="clausula" placeholder="Clausula">
                                </div>
                              </div>
                              <!-- Correo Electronico -->
                              <div class="col-md-6">
                                <div class="input-group">
                                  <label class="col-sm-4 col-form-label">Correo Electronico</label>
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""> <i class="fas fa-user-shield"></i> </span>
                                  </div>
                                  <input type="text" class="form-control" id="correo_electronico" placeholder="Correo Electronico" readonly>
                                </div>
                              </div>
                            </div>
                            <!-- Cuarta Fila -->
                            <div class="form-group row">
                              <!-- Departamento -->
                              <div class="col-md-3 mb-3">
                                <label for="tipo_trabajador">Departamento</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="" placeholder="Nombre Producto">
                                </div>
                              </div>
                              <!-- Provincia -->
                              <div class="col-md-3 mb-3">
                                <label for="local">Provincia</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="" placeholder="Nombre Producto">
                                </div>
                              </div>
                              <!-- Distrito -->
                              <div class="col-md-3 mb-3">
                                <label for="cargo">Distrito</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="" placeholder="Nombre Producto">
                                </div>
                              </div>
                              <!-- Condicion Pago -->
                              <div class="col-md-3 mb-3">
                                <label for="sexo">Condicion Pago</label>
                                <div class="input-group">
                                  <select class="form-control select2" id="id_condicion_pago" style="width: 100%; height:50%;">

                                    <option value="0">Seleccione</option>
                                    <?php foreach ($cbox_condicion_pago as $cbox_condicion_pago) : ?>
                                      <option value="<?php echo $cbox_condicion_pago->id_dmultitabla; ?>">
                                        <?php echo $cbox_condicion_pago->descripcion; ?>
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


                              <!-- Inicio Modal Almacen-->
                              <div class="col-md-2">
                                <div class="form-check">
                                  <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#opcion_target_producto">
                                  </button>
                                  <label class="form-check-label">Almacen</label>
                                  <div class="modal fade" id="opcion_target_producto" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Productos Almacen</h4>
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
                                                      <?php $buscar_productos = $index_productos->descripcion_producto . "*" . $index_productos->precio_venta; ?>
                                                      <button type="button" class="btn btn-outline-success btn-sm js_seleccionar_modal_producto" value="<?php echo $buscar_productos; ?>" data-toggle="modal" data-target="#opcion_target_producto"><span class="fa fa-check"></span></button>
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
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- Fin de Modal Almacen -->

                              <!-- Inicio Modal Tablero -->
                              <div class="col-md-2">
                                <div class="form-check">
                                  <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#opcion_target_tablero">
                                  </button>
                                  <label class="form-check-label">Tableros</label>

                                  <div class="modal fade" id="opcion_target_tablero">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Tableros</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <table id="id_datatable_tableros" class="table table-bordered table-sm table-hover table-responsive">
                                            <thead>
                                              <tr>
                                                <th></th>
                                                <th id="dtable_ds_almacen_tablero">Almacen</th>
                                                <th id="dtable_codigo_tablero">Codigo</th>
                                                <th id="dtable_descripcion_producto_tablero">Descripcion</th>
                                                <th id="dtable_ds_marca_producto_tablero">Marca</th>
                                                <th id="dtable_ds_grupo_tablero">Modelo</th>
                                                <th id="dtable_ds_moneda_tablero">Moneda</th>
                                                <th></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php if (!empty($index_tableros)) : ?>
                                                <?php foreach ($index_tableros as $index_tableros) : ?>
                                                  <tr>
                                                    <td>
                                                      <?php $buscar_tableros = $index_tableros->descripcion_tablero; ?>
                                                      <button type="button" class="btn btn-outline-success btn-sm js_seleccionar_modal_tablero" value="<?php echo $buscar_tableros; ?>" data-toggle="modal" data-target="#opcion_target_tablero"><span class="fa fa-check"></span></button>
                                                    </td>
                                                    <td><?php echo $index_tableros->ds_almacen; ?></td>
                                                    <td><?php echo $index_tableros->codigo_tablero; ?></td>
                                                    <td><?php echo $index_tableros->descripcion_tablero; ?></td>
                                                    <td><?php echo $index_tableros->ds_marca_tablero; ?></td>
                                                    <td><?php echo $index_tableros->ds_modelo_tablero; ?></td>
                                                    <td><?php echo $index_tableros->ds_moneda; ?></td>
                                                    <td>
                                                      <button type="button" class="btn btn-info btn-sm js_seleccionar_modal_detalle_tablero " value="<?php echo $index_tableros->id_tablero; ?>" data-toggle="modal" data-target="#opcion_target_detalle_tablero"><span class="fas fa-search-plus"></span>
                                                      </button>
                                                    </td>
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
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>

                                </div>
                              </div>

                              <div class="modal fade" id="opcion_target_detalle_tablero" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                  <div class="modal-content">
                                  </div>
                                </div>
                              </div>

                              <!-- Fin de Modal Tablero -->

                              <!-- Inicio Modal Comodin -->
                              <div class="col-md-2">
                                <div class="form-check">
                                  <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#opcion_target_comodin">
                                  </button>
                                  <label class="form-check-label">Comodin</label>
                                  <div class="modal fade" id="opcion_target_comodin" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-lf">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Comodin</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">

                                          <div class="form-group">
                                            <div class="col-md-12">
                                              <div class="input-group">
                                                <label class="col-sm-5 col-form-label">Codigo Producto</label>
                                                <input type="text" class="form-control" id="" placeholder="Codigo Producto">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="col-md-12">
                                              <div class="input-group">
                                                <label class="col-sm-5 col-form-label">Nombre Producto</label>
                                                <input type="text" class="form-control" id="comodin_nombre_producto" placeholder="Nombre Producto">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-md-12">
                                              <div class="input-group">
                                                <label class="col-sm-5 col-form-label">Tipo Moneda</label>
                                                <input type="text" class="form-control" id="" placeholder="Tipo de Moneda">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-md-12">
                                              <div class="input-group">
                                                <label class="col-sm-5 col-form-label">Precio</label>
                                                <input type="text" class="form-control" id="comodin_precio" placeholder="Precio">
                                              </div>
                                            </div>
                                          </div>
                                          <!-- <div class="form-group">
                                            <div class="col-md-12">
                                              <div class="input-group">
                                                <label class="col-sm-5 col-form-label">Cantidad</label>
                                                <input type="text" class="form-control" id="comodin_cantidad" placeholder="Cantidad">
                                              </div>
                                            </div>
                                          </div> -->
                                          <div class="form-group">
                                            <div class="col-md-12">
                                              <div class="input-group">
                                                <label class="col-sm-5 col-form-label">Almacen</label>
                                                <input type="text" class="form-control" id="" placeholder="Nombre Almacen">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-md-12">
                                              <div class="input-group">
                                                <label class="col-sm-5 col-form-label">Marca</label>
                                                <input type="text" class="form-control" id="" placeholder="Marca">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-md-12">
                                              <div class="input-group">
                                                <label class="col-sm-5 col-form-label">Unidad Medida</label>
                                                <input type="text" class="form-control" id="" placeholder="Unidad Medida">
                                              </div>
                                            </div>
                                          </div>

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-outline-success js_seleccionar_modal_comodin" data-toggle="modal" data-target="#opcion_target_comodin">Registrar <span class="fa fa-check"></span>
                                          </button> <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                                </div>
                              </div>
                              <!-- Fin de Modal Comodin -->

                            </div>


                            <div class="form-group row">

                              <!-- Producto -->
                              <div class="col-md-5">
                                <div class="input-group">
                                  <label class="col-sm-3 col-form-label">Producto</label>
                                  <input type="text" class="form-control" id="descripcion_producto" readonly>
                                </div>
                              </div>
                              <!-- Precio -->
                              <div class="col-md-3">
                                <div class="input-group">
                                  <label class="col-sm-4 col-form-label">Precio</label>
                                  <input type="text" class="form-control" id="precio_venta" readonly>
                                </div>
                              </div>
                              <!-- Stock -->
                              <div class="col-md-2">
                                <div class="input-group">
                                  <label class="col-sm-5 col-form-label">Stock</label>
                                  <input type="text" class="form-control" id="stock" readonly>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="input-group">
                                  <label class="col-sm-7 col-form-label">Cantidad</label>
                                  <input type="text" class="form-control" id="cantidad" ">
                                </div>
                              </div>

                            </div>

                          </div>
                        </div>
                      </div>

                      <!--IZQUIERDA-->
                      <div class=" col-md-6">
                                  <!-- Primer Card -->
                                  <div class="card card-success">
                                    <div class="card-header">
                                      <h3 class="card-title">Aplicar Ganancia</h3>
                                    </div>
                                    <div class="card-body">
                                      <!-- Primera Fila -->
                                      <div class="form-group row">
                                        <center>
                                          <div class="col-md-12">
                                            <div class="input-group">
                                              <label class="col-sm-6 col-form-label">Ingrese Precio</label>
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id=""> <i class="fas fa-user-shield"></i> </span>
                                              </div>
                                              <input type="text" class="form-control" id="" placeholder="Ingrese Precio">
                                            </div>
                                          </div>
                                        </center>
                                      </div>
                                      <!-- Segunda Fila -->
                                      <div class="form-group row">
                                        <!-- G% -->
                                        <div class="col-md-3 mb-3">
                                          <label for="tipo_trabajador">G%</label>
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroupTipoTrabajador"> <i class="fas fa-user-shield"></i> </span>
                                            </div>
                                            <input type="text" class="form-control" id="" placeholder="G%">
                                          </div>
                                        </div>
                                        <!-- Provincia -->
                                        <div class="col-md-4 mb-3">
                                          <label for="local">G. Unidad</label>
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroupLocal"> <i class="fas fa-user-shield"></i> </span>
                                            </div>
                                            <input type="text" class="form-control" id="" placeholder="G. Unidad" readonly>
                                          </div>
                                        </div>
                                        <!-- Distrito -->
                                        <div class="col-md-5 mb-3">
                                          <label for="cargo">G. Cant/Total</label>
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroupCargo"> <i class="fas fa-user-shield"></i> </span>
                                            </div>
                                            <input type="text" class="form-control" id="" placeholder="G. Cant/Total" readonly>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!--DERECHA-->
                                <div class="col-md-6">
                                  <!-- Primer Card -->
                                  <div class="card card-danger">
                                    <div class="card-header">
                                      <h3 class="card-title">Aplicar Descuento</h3>
                                    </div>
                                    <div class="card-body">
                                      <!-- Primera Fila -->
                                      <div class="form-group row">
                                        <center>
                                          <div class="col-md-12">
                                            <div class="input-group">
                                              <label class="col-sm-6 col-form-label">Precio Descuento</label>
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id=""> <i class="fas fa-user-shield"></i> </span>
                                              </div>
                                              <input type="text" class="form-control" id="" placeholder="Ingrese Precio">
                                            </div>
                                          </div>
                                        </center>


                                      </div>
                                      <!-- Segunda Fila -->
                                      <div class="form-group row">
                                        <!-- G% -->
                                        <div class="col-md-3 mb-3">
                                          <label for="tipo_trabajador">G%</label>
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroupTipoTrabajador"> <i class="fas fa-user-shield"></i> </span>
                                            </div>
                                            <input type="text" class="form-control" id="" placeholder="G%">
                                          </div>
                                        </div>
                                        <!-- Provincia -->
                                        <div class="col-md-4 mb-3">
                                          <label for="local">G. Unidad</label>
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroupLocal"> <i class="fas fa-user-shield"></i> </span>
                                            </div>
                                            <input type="text" class="form-control" id="" placeholder="G. Unidad" readonly>
                                          </div>
                                        </div>
                                        <!-- Distrito -->
                                        <div class="col-md-5 mb-3">
                                          <label for="cargo">G. Cant/Total</label>
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroupCargo"> <i class="fas fa-user-shield"></i> </span>
                                            </div>
                                            <input type="text" class="form-control" id="" placeholder="G. Cant/Total" readonly>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <!-- Primer Card -->
                                  <div class="card card-secondary">
                                    <!-- <div class="card-header">
                            <h3 class="card-title">XXXXXXX</h3>
                          </div> -->
                                    <div class="card-body">
                                      <!-- Primera Fila -->

                                      <div class="form-group row">
                                        <!--  -->
                                        <div class="col-md-3">
                                          <div class="input-group">
                                            <!-- <label class="col-sm-2 col-form-label">XXXXX</label> -->
                                            <!-- <input type="text" class="form-control" placeholder="XXXXXX"> -->
                                            <!-- <span class="input-group-append">
                                    <button type="button" class="btn btn-info btn-flat">Buscar</button>
                                  </span> -->
                                          </div>
                                        </div>

                                        <div class="col-md-3">
                                          <div class="input-group">
                                            <label class="col-sm-6 col-form-label">Importe Total</label>
                                            <input type="text" class="form-control" id="" placeholder="" readonly>
                                          </div>
                                        </div>

                                        <div class="col-md-2">
                                          <!-- <label class="col-sm-7 col-form-label"></label> -->
                                          <!-- <input type="button" class="btn btn-danger btn-sm" id="" placeholder=""> -->
                                          <button type="button" class="btn btn-primary" id="registrar">AGREGAR</button>

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
                                      <h3 class="card-title">Detalle Cotización</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form class="form-horizontal">
                                      <div class="card-body">
                                        <table id="id_table_detalle_multitablas" class="table table-sm table-hover">
                                          <thead>
                                            <tr>
                                              <th>Item</th>
                                              <th>Codigo</th>
                                              <th>Producto</th>
                                              <th>Marca</th>
                                              <th>Uni</th>
                                              <th>Cant</th>
                                              <th>Precio U</th>
                                              <th>Valor Venta</th>
                                              <th>Almacen</th>
                                              <th>Desc Total</th>
                                              <th>Desc %</th>
                                              <th>Dias Ent</th>
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