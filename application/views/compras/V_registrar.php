  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registrar Compras
              <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
              <a href="<?php echo base_url(); ?>C_compras" class="btn btn-danger btn-sm">CANCELAR</a>
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
                <h2 class="card-title">Registro de Compras/Pagos de Compras</h3>
              </div>
              <div class="card-body">
                <div class="card card-info card-tabs">
                  <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Registro de Compras</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Pagos de Compras</a>
                      </li>
                    </ul>
                  </div>
                  <!-- CABECERAS -->
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                      <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <div class="card card-info">
                          <div class="card-body">
                            <form class="needs-validation" novalidate>
                              <!-- Primera Fila-->
                              <div class="form-row align-items-center">
                                <!-- CODIGO DE COMPRA -->
                                <div class="col-md-2 mb-3">
                                  <label for="id_compras">Codigo</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="id_compras" value="001" readonly="" placeholder="" required>
                                  </div>
                                </div>
                                <!-- ENCARGADO-->
                                <div class="col-md-4 mb-3">
                                  <label for="">Encargado</label>
                                  <div class="input-group">
                                    <select class="custom-select " id="encargado" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($encargado as $encargado) : ?>
                                        <option value="<?php echo $encargado->ds_encargado; ?>">
                                          <?php echo $encargado->ds_encargado; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                                <!-- FECHA DE EMISION -->
                                <div class="col-md-3 mb-3">
                                  <label for="fecha_emision_voucher">Fecha de Emisión </label>
                                  <div class="input-group">
                                    <input type="date" class="form-control" id="fecha_emision_voucher" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                  </div>
                                </div>
                                <!-- FECHA DE VENCIMIENTO -->
                                <div class="col-md-3 mb-3">
                                  <label for="fecha_vencimiento_voucher">Fecha de Vencimiento</label>
                                  <div class="input-group">
                                    <input type="date" class="form-control" id="fecha_vencimiento_voucher" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                  </div>
                                </div>
                              </div>
                              <!-- Segunda Fila -->
                              <div class="form-row align-items-center">
                                <!-- TIPO DE COMPROBANTE-->
                                <div class="col-md-3 mb-3 ">
                                  <label for="tipo_comprobante">Tipo de Comprobante</label>
                                  <div class="input-group">
                                    <select class="custom-select " id="tipo_comprobante" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_tipo_comprobante as $cbox_tipo_comprobante) : ?>
                                        <option value="<?php echo $cbox_tipo_comprobante->id_dmultitabla; ?>">
                                          <?php echo $cbox_tipo_comprobante->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                                <!-- NUMERO DE SERIE-->
                                <div class="col-md-3 mb-3">
                                  <label for="numero_serie">N° Serie</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="numero_serie" placeholder="Ingresa el N° de Serie" required>
                                  </div>
                                </div>
                                <!-- EXAMINAR ARCHIVO -->
                                <div class="col-md-3 mb-3">
                                  <label for="subir_factura">Subir Archivo</label>
                                  <div class="input-group">
                                    <input type="file" class="form-control" id="subir_factura" accept=".pdf, .doc, .jpg, .png" value="Examinar" required>
                                  </div>
                                </div>
                                <!-- MERCADERIA-->
                                <div class="col-md-3 mb-3 ">
                                  <label for="mercaderia">Mercaderia</label>
                                  <div class="input-group">
                                    <select class="custom-select " id="mercaderia" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_mercaderia as $cbox_mercaderia) : ?>
                                        <option value="<?php echo $cbox_mercaderia->id_dmultitabla; ?>">
                                          <?php echo $cbox_mercaderia->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <!-- Tercera Fila -->
                              <div class="form-row align-items-center ">
                                <!-- PROVEEDOR -->
                                <div class="col-md-6 mb-3">
                                  <label for="proveedor">Proveedor</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="proveedor" placeholder="Ingresa el Nombre" readonly required>
                                    <input type="hidden" id="id_proveedor">
                                    <div class="input-group-prepend ">
                                      <button class="btn btn-info" type="button" data-toggle="modal" data-target="#opcion_target_proveedores">Buscar</button>
                                      <div class="modal fade" id="opcion_target_proveedores" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Proveedores</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <table id="id_datatable_proveedores" class="table table-bordered table-sm table-hover table-responsive">
                                                <thead>
                                                  <tr>
                                                    <th></th>
                                                    <th id="dtable_codigo">Codigo</th>
                                                    <th id="dtable_razon_social">Razon Social</th>
                                                    <th id="dtable_ruc">RUC</th>
                                                    <th id="dtable_correo">Correo</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <?php if (!empty($proveedor)) : ?>
                                                    <?php foreach ($proveedor as $index_proveedores) : ?>
                                                      <tr>
                                                        <td>
                                                          <?php $split_proveedores =
                                                            $index_proveedores->id_cliente_proveedor . "*" .
                                                            $index_proveedores->razon_social . "*" .
                                                            $index_proveedores->num_documento . "*" .
                                                            $index_proveedores->email;
                                                          ?>

                                                          <button type="button" class="btn btn-outline-success btn-sm js_seleccionar_modal_proveedores" value="<?php echo $split_proveedores; ?>" data-toggle="modal" data-target="#opcion_target_proveedores"><span class="fas fa-check"></span></button>
                                                        </td>

                                                        <td><?php echo $index_proveedores->id_cliente_proveedor; ?></td>
                                                        <td><?php echo $index_proveedores->razon_social; ?></td>
                                                        <td><?php echo $index_proveedores->num_documento; ?></td>
                                                        <td><?php echo $index_proveedores->email; ?></td>
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
                                </div>
                                <!-- CONDICION DE PAGO-->
                                <div class="col-md-2 mb-3 ">
                                  <label for="condicion_pago">Condición de Pago</label>
                                  <div class="input-group">
                                    <select class="custom-select " id="condicion_pago" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_condicion_pago as $cbox_condicion_pago) : ?>
                                        <option value="<?php echo $cbox_condicion_pago->id_dmultitabla; ?>">
                                          <?php echo $cbox_condicion_pago->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                                <!-- MEDIO DE PAGO-->
                                <div class="col-md-2 mb-3 ">
                                  <label for="medio_pago">Medio de Pago</label>
                                  <div class="input-group">
                                    <select class="custom-select " id="medio_pago" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_medio_pago as $cbox_medio_pago) : ?>
                                        <option value="<?php echo $cbox_medio_pago->id_dmultitabla; ?>">
                                          <?php echo $cbox_medio_pago->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                                <!-- MONEDA -->
                                <div class="col-md-2 mb-3 ">
                                  <label for="moneda">Moneda</label>
                                  <div class="input-group">
                                    <select class="custom-select " id="moneda" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_moneda as $cbox_moneda) : ?>
                                        <option value="<?php echo $cbox_moneda->id_dmultitabla; ?>">
                                          <?php echo $cbox_moneda->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <!-- Cuarta Fila -->
                              <div class="form-row align-items-center">
                                <!-- CUENTA ENTR-->
                                <div class="col-md-2 mb-3 ">
                                  <label for="cta_ent">Cta. Entr</label>
                                  <div class="input-group">
                                    <select class="custom-select " id="cta_ent" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_cta_ent as $cbox_cta_ent) : ?>
                                        <option value="<?php echo $cbox_cta_ent->id_dmultitabla; ?>">
                                          <?php echo $cbox_cta_ent->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                                <!-- SUBTOTAL -->
                                <div class="col-md-3 mb-3">
                                  <label for="subtotal_factura">Subtotal</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="subtotal_factura" placeholder="" required>
                                  </div>
                                </div>
                                <!-- IGV-->
                                <div class="col-md-2 mb-3">
                                  <label for="igv_factura">Igv</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="igv_factura" placeholder="" required>
                                  </div>
                                </div>
                                <!-- TOTAL -->
                                <div class="col-md-3 mb-3">
                                  <label for="total_factura">Total</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="total_factura" placeholder="" required>
                                  </div>
                                </div>
                                <!-- ESTADO-->
                                <div class="col-md-2 mb-3 ">
                                  <label for="estado_compra">Estado</label>
                                  <div class="input-group">
                                    <select class="custom-select " id="estado_compra" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_tipo_persona_sunat as $cbox_tipo_persona_sunat) : ?>
                                        <option value="<?php echo $cbox_tipo_persona_sunat->id_dmultitabla; ?>">
                                          <?php echo $cbox_tipo_persona_sunat->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <!-- Quinta Fila -->
                              <div class="form-row align-items-center">
                                <!-- OBSERVACIONES Y DATOS EXTRAS -->
                                <div class="col-md-12 mb-3">
                                  <label for="observacion_pago">Observaciones y Datos Extras</label>
                                  <div class="input-group">
                                    <textarea class="form-control" id="observacion_pago" rows="5" required></textarea>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <!--fin-registro de compras  -->
                      </div>
                      <!-- fin del primer tab-->

                      <!-- COMIENZA SEGUNDO TAB -->
                      <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <div class="card card-info">
                          <div class="card-body">
                            <form class="needs-validation" novalidate>
                              <!--Primera Fila-->
                              <div class="form-row align-items-center">
                                <!-- VOUCHER -->
                                <div class="col-md-3 mb-3">
                                  <label for="voucher_pago">N° Voucher</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="voucher_pago" placeholder="N° Voucher" required>
                                  </div>
                                </div>
                                <!-- TRANSACCIÓN-->
                                <div class="col-md-3 mb-3">
                                  <label for="transaccion">Transaccion</label>
                                  <div class="input-group">
                                    <select class="custom-select " id="transaccion" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_transaccion as $cbox_transaccion) : ?>
                                        <option value="<?php echo $cbox_transaccion->id_dmultitabla; ?>">
                                          <?php echo $cbox_transaccion->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                                <!-- FECHA DE VOUCHER -->
                                <div class="col-md-3 mb-3">
                                  <label for="fecha_pago_voucher">Fecha de Voucher</label>
                                  <div class="input-group">
                                    <input type="date" class="form-control" id="fecha_pago_voucher" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                  </div>
                                </div>
                                <!-- TIPO DE CAMBIO-->
                                <div class="col-md-3 mb-3">
                                  <label for="tipo_cambio">Tipo de Cambio</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="tipo_cambio" placeholder="Tipo de Cambio" required>
                                  </div>
                                </div>
                              </div>
                              <!-- Segunda Fila -->
                              <div class="form-row align-items-center">
                                <!-- N° DEPOSITO -->
                                <div class="col-md-3 mb-3">
                                  <label for="numero_deposito">N° Deposito :</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="numero_deposito" placeholder="" required>
                                  </div>
                                </div>
                                <!-- N° LETRA - CHEKE -->
                                <div class="col-md-3 mb-3">
                                  <label for="numero_letra_cheque">N° Letra / Cheque :</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="numero_letra_cheque" placeholder="" required>
                                  </div>
                                </div>
                                <!-- BANCO-->
                                <div class="col-md-3 mb-3 ">
                                  <label for="banco">Banco</label>
                                  <div class="input-group">
                                    <select class="custom-select" id="banco" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_banco as $cbox_banco) : ?>
                                        <option value="<?php echo $cbox_banco->id_dmultitabla; ?>"><?php echo $cbox_banco->descripcion; ?></option>
                                      <?php endforeach; ?>
                                      <input type="hidden" class="form-control" id="prueba" placeholder="" required>
                                    </select>
                                  </div>
                                </div>
                                <!-- MEDIO DE PAGO VOUCHER -->
                                <div class="col-md-3 mb-3 ">
                                  <label for="medio_pago_voucher">Medio de Pago</label>
                                  <div class="input-group">
                                    <select class="custom-select " id="medio_pago_voucher" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_medio_pago_voucher as $cbox_medio_pago_voucher) : ?>
                                        <option value="<?php echo $cbox_medio_pago_voucher->id_dmultitabla; ?>"><?php echo $cbox_medio_pago_voucher->descripcion; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <!-- Tercera Fila -->
                              <div class="form-row align-items-center">
                                <!-- IMPORTE -->
                                <div class="col-md-3 mb-3">
                                  <label for="importe_pago">Importe</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="importe_pago" placeholder="" aria-describedby="inputGroupImportePago" required>
                                  </div>
                                </div>
                                <!-- LEYENDA -->
                                <div class="col-md-3 mb-3 ">
                                  <label for="leyenda">Leyenda</label>
                                  <div class="input-group">
                                    <select class="custom-select " id="leyenda" aria-describedby="inputGroupLeyenda" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_leyenda as $cbox_leyenda) : ?>
                                        <option value="<?php echo $cbox_leyenda->id_dmultitabla; ?>">
                                          <?php echo $cbox_leyenda->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                                <!-- EXAMINAR ARCHIVO -->
                                <div class="col-md-6 mb-3">
                                  <label for="subir_voucher">Subir Archivo</label>
                                  <div class="input-group">
                                    <input type="file" class="form-control" id="subir_voucher" accept=".pdf, .doc, .jpg, .png" value="Examinar" aria-describedby="inputGroupSubirVoucher" required>
                                  </div>
                                </div>
                              </div>
                              <!-- Cuarta Fila -->
                              <div class="form-row align-items-center">
                                <!-- OBSERVACION -->
                                <div class="col-md-7 mb-3">
                                  <label for="observacion_voucher">Observación</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="observacion_voucher" placeholder="" aria-describedby="inputGroupObservacionVoucher" required>
                                  </div>
                                </div>
                                <!-- ESTADO -->
                                <div class="col-md-4 mb-3 ">
                                  <label for="estado_voucher">Estado</label>
                                  <div class="input-group">
                                    <select class="custom-select " id="estado_voucher" aria-describedby="inputGroupEstadoVoucher" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_tipo_documento as $cbox_tipo_documento) : ?>
                                        <option value="<?php echo $cbox_tipo_documento->id_dmultitabla; ?>">
                                          <?php echo $cbox_tipo_documento->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="col-md-2  ">
                                      <label for="" hidden></label>
                                      <button type="button" class="btn btn-primary" id="agregar_pago">Agregar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>

                        <!-- PROGRAMACION DE PAGOS -->

                        <div class="card card-info">
                          <div class="card-header">
                            <h3 class="card-title">Programacion de Pagos</h3>
                          </div>
                          <div class="card-body">
                            <form class="needs-validation" novalidate>
                              <table id="id_table_detalles_pagos" class="table table-sm table-hover">
                                <thead>
                                  <tr>
                                    <th>Codigo</th>
                                    <th>Fecha de Vencimiento</th>
                                    <th>Medio de Pago</th>
                                    <th>Banco</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </tbody>
                              </table>
                            </form>
                          </div>
                        </div>
                        <!-- INPUTS FINALES -->
                        <div class="card card-info">
                          <div class="card-header">
                            <h3 class="card-title">Suma de Precios</h3>
                          </div>
                          <div class="card-body">
                            <form class="needs-validation" novalidate>
                              <div class="form-row align-items-center">
                                <!-- TOTAL DEUDA-->
                                <div class="col-md-3 mb-3">
                                  <label for="total_deuda_voucher">Total</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="total_deuda_voucher" placeholder="" aria-describedby="inputGroupTotalDeudaVoucher" required>
                                  </div>
                                </div>
                                <!-- MONTO PAGADO VOUCHER-->
                                <div class="col-md-3 mb-3">
                                  <label for="monto_pagado_voucher">Pagado</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="monto_pagado_voucher" placeholder="" aria-describedby="inputGroupMontoPagadoVoucher" required>
                                  </div>
                                </div>
                                <!-- MONTO PENDIENTE VOUCHER-->
                                <div class="col-md-3 mb-3">
                                  <label for="monto_pendiente_voucher">Pendiente</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="monto_pendiente_voucher" placeholder="" aria-describedby="inputGroupMontoPendienteVoucher" required>
                                  </div>
                                </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.div -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- COMIENZA EL FOOTER  --- COMIENZA EL FOOTER --- COMIENZA EL FOOTER --- COMIENZA EL FOOTER -->

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

  <script src="<?php echo base_url() ?>application/js/j_compras.js"></script>

  </body>

  </html>