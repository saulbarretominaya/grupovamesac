<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cotizacion
            <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
            <a href="<?php echo base_url(); ?>C_cotizacion" class="btn btn-danger btn-sm">CANCELAR</a>
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
                        <div class="col-md-4">
                          <label for="cargo">Vendedor</label>
                          <div class="input-group">
                            <input type="hidden" id="" value="<?php echo $this->session->userdata("id_usuario") ?>">
                            <input type="text" class="form-control" id="" value="<?php echo $this->session->userdata("ds_nombre_usuario") ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="cargo">Fecha Emision</label>
                          <div class="input-group">
                            <?php
                            date_default_timezone_set("America/Lima");
                            ?>
                            <input type="date" class="form-control" id="fecha_cotizacion" value="<?php echo date("Y-m-d"); ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label for="cargo">Validez Oferta</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="validez_oferta_cotizacion">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label>Fecha Venc. Validez Oferta</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="fecha_vencimiento_validez_oferta" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Datos de Cliente/Proveedor</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-6">
                              <label for="">Cliente</label>
                              <div class="input-group">
                                <input type="hidden" class="form-control" id="id_cliente_proveedor">
                                <input type="text" class="form-control" id="ds_nombre_cliente_proveedor">
                                <span class="input-group-append">
                                  <button type="button" class="btn btn-outline-success btn-flat" data-toggle="modal" data-target="#opcion_target_clientes_proveedores">
                                    Buscar
                                  </button>
                                  <!-- <a href="<?php echo base_url() . "C_clientes_proveedores" ?>"><button type="button" class="btn btn-outline-primary"><i class="fas fa-user-plus"></i></button></a> -->
                                  <!-- Modal -->
                                  <div class="modal fade" id="opcion_target_clientes_proveedores" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Clientes / Provedores</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <table id="id_datatable_clientes_proveedores" class="table table-bordered table-sm table-hover table-responsive">
                                            <thead>
                                              <tr>
                                                <th></th>
                                                <th id="dtable_ds_tipo_persona">Tipo Persona</th>
                                                <th id="dtable_ds_nombre_cliente_proveedor">Razon Social</th>
                                                <th id="dtable_ds_tipo_documento">Tipo Documento</th>
                                                <th id="dtable_num_documento">Num Documento</th>
                                                <th id="dtable_direccion_fiscal">Direccion Fiscal</th>
                                                <th id="dtable_email">Correo Electronico</th>
                                                <th id="dtable_contacto_registro">Contacto Registro</th>
                                                <th id="dtable_telefono">Telefono</th>
                                                <th id="dtable_celular">Celular</th>
                                                <th id="dtable_ds_tipo_giro">Tipo Giro</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php if (!empty($index_clientes_proveedores)) : ?>
                                                <?php foreach ($index_clientes_proveedores as $index_clientes_proveedores) : ?>
                                                  <tr>
                                                    <td>
                                                      <?php $split_clientes_proveedores =
                                                        $index_clientes_proveedores->id_cliente_proveedor . "*" .
                                                        $index_clientes_proveedores->ds_nombre_cliente_proveedor . "*" .
                                                        $index_clientes_proveedores->ds_departamento_cliente_proveedor . "*" .
                                                        $index_clientes_proveedores->ds_provincia_cliente_proveedor . "*" .
                                                        $index_clientes_proveedores->ds_distrito_cliente_proveedor . "*" .
                                                        $index_clientes_proveedores->direccion_fiscal_cliente_proveedor . "*" .
                                                        $index_clientes_proveedores->email_cliente_proveedor;
                                                      ?>
                                                      <button type="button" class="btn btn-outline-success btn-sm js_seleccionar_modal_clientes_proveedores" value="<?php echo $split_clientes_proveedores; ?>" data-toggle="modal" data-target="#opcion_target_clientes_proveedores"><span class="fas fa-check"></span></button>
                                                    </td>
                                                    <td><?php echo $index_clientes_proveedores->ds_tipo_persona; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->ds_nombre_cliente_proveedor; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->ds_tipo_documento; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->num_documento; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->direccion_fiscal_cliente_proveedor; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->email_cliente_proveedor; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->contacto_registro; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->telefono; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->celular; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->ds_tipo_giro; ?></td>
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
                                  <!-- Fin Modal -->
                                </span>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="">Departamento</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="ds_departamento_cliente_proveedor" readonly></textarea>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="">Provincia</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="ds_provincia_cliente_proveedor" readonly></textarea>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="">Distrito</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="ds_distrito_cliente_proveedor" readonly></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="">Direccion Fiscal</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="direccion_fiscal_cliente_proveedor" autocomplete="nope" readonly></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Correo Electronico</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="email_cliente_proveedor" autocomplete="nope">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Clausula</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="clausula">Ninguna Clausula</textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Lugar Entrega</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="lugar_entrega">Carabayllo</textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-6">
                              <label for="tipo_trabajador">Nombre Encargado</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="nombre_encargado" value="Richard Torres Torres">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="tipo_trabajador">Observacion</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="observacion">Ninguna Observacion</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Fecha de Vencimiento</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-6">
                              <label># Dias</label>
                              <div class="input-group">
                                <!-- <input type="text" class="form-control" id="numero_dias_condicion_pago"> -->
                                <input type="text" class="form-control" id="dias" value="" autocomplete="nope">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label>Fecha Vencimiento</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="fecha_condicion_pago" readonly>
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
                        <!-- Producto -->
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
                                          <th id="dtable_ds_stock">Stock</th>
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
                                                  $index_productos->id_producto . "*" .
                                                  $index_productos->id_general . "*" .
                                                  $index_productos->codigo_producto . "*" .
                                                  $index_productos->descripcion_producto . "*" .
                                                  $index_productos->id_unidad_medida . "*" .
                                                  $index_productos->ds_unidad_medida . "*" .
                                                  $index_productos->id_marca_producto . "*" .
                                                  $index_productos->ds_marca_producto . "*" .
                                                  $index_productos->id_moneda . "*" .
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
                                              . <td><?php echo $index_productos->ds_moneda; ?></td>
                                              <td><?php echo $index_productos->precio_unitario; ?></td>
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
                        <!-- Fin Producto -->
                        <!-- Tableros -->
                        <div class="col-md-2">
                          <div class="form-check">
                            <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#opcion_target_tablero">
                            </button>
                            <label class="form-check-label">Tableros</label>
                            <div class="modal fade" id="opcion_target_tablero" tabindex="-1">
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
                                          <th id="dtable_cantidad_tablero">Cant Tablero</th>
                                          <th id="dtable_ds_marca_producto_tablero">Marca</th>
                                          <th id="dtable_ds_grupo_tablero">Modelo</th>
                                          <th id="dtable_ds_moneda_tablero">Moneda</th>
                                          <th id="dtable_precio_unitario_por_tablero">Precio Unitario</th>
                                          <th></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php if (!empty($index_tableros)) : ?>
                                          <?php foreach ($index_tableros as $index_tableros) : ?>
                                            <tr>
                                              <td>
                                                <?php $split_tableros =
                                                  $index_tableros->id_tablero . "*" .
                                                  $index_tableros->id_general . "*" .
                                                  $index_tableros->codigo_tablero . "*" .
                                                  $index_tableros->descripcion_tablero . "*" .
                                                  $index_tableros->cantidad_tablero . "*" .
                                                  $index_tableros->id_marca_tablero . "*" .
                                                  $index_tableros->ds_marca_tablero . "*" .
                                                  $index_tableros->id_moneda . "*" .
                                                  $index_tableros->ds_moneda . "*" .
                                                  $index_tableros->precio_unitario_por_tablero;
                                                ?>
                                                <button type="button" class="btn btn-outline-success btn-sm js_seleccionar_modal_tablero" value="<?php echo $split_tableros; ?>" data-toggle="modal" data-target="#opcion_target_tablero"><span class="fa fa-check"></span></button>
                                              </td>
                                              <td><?php echo $index_tableros->ds_almacen; ?></td>
                                              <td><?php echo $index_tableros->codigo_tablero; ?></td>
                                              <td><?php echo $index_tableros->descripcion_tablero; ?></td>
                                              <td><?php echo $index_tableros->cantidad_tablero; ?></td>
                                              <td><?php echo $index_tableros->ds_marca_tablero; ?></td>
                                              <td><?php echo $index_tableros->ds_modelo_tablero; ?></td>
                                              <td><?php echo $index_tableros->ds_moneda; ?></td>
                                              <td><?php echo $index_tableros->precio_unitario_por_tablero; ?></td>
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
                              </div>
                            </div>
                          </div>
                          <div class="modal fade" id="opcion_target_detalle_tablero" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                              <div class="modal-content">
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Fin de Tableros -->
                        <!-- Comodin -->
                        <div class="col-md-2">
                          <div class="form-check">
                            <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#opcion_target_comodin">
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
                        </div>
                        <!-- Fin Comodin -->
                        <div class="col-md-6">
                          <div class="input-group">
                            <label class="col-sm-3 col-form-label">Producto</label>
                            <textarea class="form-control" rows="1" placeholder="Nombre Producto" id="descripcion_producto" readonly></textarea>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" id="hidden_id_producto">
                      <input type="hidden" id="hidden_id_general">
                      <input type="hidden" id="hidden_id_tablero">
                      <input type="hidden" id="hidden_id_comodin">
                      <input type="hidden" id="hidden_codigo_producto">
                      <input type="hidden" id="hidden_id_unidad_medida">
                      <input type="hidden" id="hidden_ds_unidad_medida">
                      <input type="hidden" id="hidden_id_marca_producto">
                      <input type="hidden" id="hidden_ds_marca_producto">
                      <input type="hidden" id="tipo_moneda_origen">
                    </div>

                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Datos del Producto</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-3">
                              <label>&nbsp;</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="simbolo_moneda" value="" readonly>
                              </div>
                            </div>
                            <div class="col-md-9">
                              <label for="">Precio Unitario</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="precio_unitario" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="card card-info">
                        <div class="card-header">
                          <h3 class="card-title">El Tipo Cambio es: <?php echo $tipo_cambio->venta; ?></h3>
                          <input type="hidden" class="form-control" id="valor_cambio" value="<?php echo $tipo_cambio->venta; ?>">
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-6">
                              <label for="">Moneda</label>
                              <div class="input-group">
                                <select class="form-select" id="tipo_moneda_cambio">
                                  <option value="0">Seleccionar</option>
                                  <?php foreach ($cbox_moneda as $cbox_moneda) : ?>
                                    <option value="<?php echo $cbox_moneda->id_dmultitabla; ?>"><?php echo $cbox_moneda->descripcion; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="">Conver. Unitario</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="convertidor_unitario" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Salida de Producto</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-4">
                              <label for="">Cantidad</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="cantidad">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="">Monto</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="monto" readonly>
                              </div>
                            </div>

                            <div class="col-md-2">
                              <label for="">&nbsp;</label>
                              <div class="input-group">
                                <button type="button" class="btn btn-outline-success" id="id_agregar_cotizacion"><span class="fas fa-plus"></span></button>
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
                            <div class="col-md-6">
                              <label>Precio Inicial</label>
                              <input type="text" class="form-control" id="precio_inicial" readonly>
                            </div>
                            <div class="col-md-6">
                              <label>Precio con Ganancia</label>
                              <input type="text" class="form-control" id="precio_ganancia" readonly>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="tipo_trabajador">G%</label>
                              <input type="text" class="form-control" id="g">
                            </div>
                            <div class="col-md-4">
                              <label for="local">G. Unidad</label>
                              <input type="text" class="form-control" id="g_unidad" readonly>
                            </div>
                            <div class="col-md-5">
                              <label for="cargo">G. Cant/Total</label>
                              <input type="text" class="form-control" id="g_cant_total" readonly>
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
                            <div class="col-md-6">
                              <label>Precio con Ganancia</label>
                              <input type="text" class="form-control" id="precio_ganancia_visor" readonly>
                            </div>
                            <div class="col-md-6">
                              <label>Precio con Descuento</label>
                              <input type="text" class="form-control" id="precio_descuento" readonly>
                              <input type="hidden" class="form-control" id="hidden_precio_descuento">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="tipo_trabajador">D%</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="d">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label for="local">D. Unidad</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="d_unidad" readonly>
                              </div>
                            </div>
                            <div class="col-md-5 ">
                              <label for="cargo">D. Cant/Total</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" id="d_cant_total" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Detalle Cotizacion</h3>
                        </div>
                        <form class="form-horizontal">
                          <div class="card-body" style="overflow-x:auto;">
                            <table id="id_table_detalle_cotizacion">
                              <thead>
                                <tr>
                                  <th>Codigo </th>
                                  <th>Descripcion</th>
                                  <th>U.M</th>
                                  <th>Marca</th>
                                  <th>Precio U</th>
                                  <th>Cant</th>
                                  <th>Desc %</th>
                                  <th>Precio U/D</th>
                                  <th>Total D</th>
                                  <th>Valor Venta</th>
                                  <th>Dias Entrega</th>
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
                          <label for="tipo_trabajador">Total</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="total" value="">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for=" local">DCTO Total</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="descuento_total" value="">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for=" local">IGV</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="igv" value="">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="sexo">Precio Venta</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="precio_venta" value="">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Condiciones de Pago</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-4">
                              <!-- <label for="">&nbsp;</label> -->
                              <div class="input-group">
                                <select class="form-select select2" id="id_condicion_pago">
                                  <option value="0">Seleccionar</option>
                                  <?php foreach ($cbox_condicion_pago_cotizacion  as $cbox_condicion_pago_cotizacion) : ?>
                                    <option value="<?php echo $cbox_condicion_pago_cotizacion->id_dmultitabla; ?>"><?php echo $cbox_condicion_pago_cotizacion->descripcion; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <!-- <label>&nbsp;</label> -->
                              <div class="input-group">
                                <input type="date" class="form-control" id="fecha_cuota" value="" autocomplete="nope">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <!-- <label>&nbsp;</label> -->
                              <div class="input-group">
                                <input type="text" class="form-control" id="monto_cuota" value="" autocomplete="nope" placeholder="Ingrese Cuota">
                              </div>
                            </div>
                            <div class="col-md-1">
                              <!-- <label for="">&nbsp;</label> -->
                              <div class="input-group">
                                <button type="button" class="btn btn-outline-success" id="id_agregar_condicion_pago"><span class="fas fa-plus"></span></button>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-12">
                              <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Detalle Condicion Pago</h3>
                                </div>
                                <form class="form-horizontal">
                                  <div class="card-body" style="overflow-x:auto;">
                                    <table id="id_table_detalle_condicion_pago">
                                      <thead>
                                        <tr>
                                          <th>Fecha </th>
                                          <th>Monto</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                      <tfoot>
                                        <tr>
                                          <th></th>
                                          <th>Monto Total:
                                            <label style="font-weight: normal;" class="control-label" id="precio_final_final"></label>
                                          </th>
                                        </tr>
                                      </tfoot>
                                      </tbody>
                                    </table>

                                  </div>
                                </form>
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