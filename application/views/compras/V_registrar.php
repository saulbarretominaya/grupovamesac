  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registrar Compras
              <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
              <a href="<?php echo base_url(); ?>C_clientes_proveedores" class="btn btn-danger btn-sm">CANCELAR</a>
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
                                <div class="col-md-3 mb-3">
                                  <label for="id_compras">Codigo</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupIdCompras"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" id="id_compras" value="" readonly="" placeholder="" aria-describedby="inputGroupIdCompras" required>
                                  </div>
                                </div>
                                <!-- ENCARGADO-->
                                <div class="col-md-3 mb-3">
                                  <label for="encargado">Encargado</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupEncargado"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <select class="custom-select " id="encargado" aria-describedby="inputGroupEncargado" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($encargado as $encargado) : ?>
                                        <option value="<?php echo $encargado->ds_omar; ?>">
                                          <?php echo $encargado->ds_omar; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                                <!-- FECHA DE EMISION -->
                                <div class="col-md-3 mb-3">
                                  <label for="fecha_emision_voucher">Fecha de Emisión </label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupFechaEmisionVoucher"> <i class="far fa-calendar-alt"></i> </span>
                                    </div>
                                    <input type="date" class="form-control" id="fecha_emision_voucher" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                  </div>
                                </div>
                                <!-- FECHA DE VENCIMIENTO -->
                                <div class="col-md-3 mb-3">
                                  <label for="fecha_vencimiento_voucher">Fecha de Vencimiento</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupFechaVencimientoVoucher"> <i class="far fa-calendar-alt"></i> </span>
                                    </div>
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
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupTipoComprobante"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <select class="custom-select " id="tipo_comprobante" aria-describedby="inputGroupTipoComprabante" required>
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
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupNumeroSerie"> <i class="far fa-id-card"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" id="numero_serie" placeholder="Ingresa el N° de Serie" aria-describedby="inputGroupNumeroSerie" required>
                                  </div>
                                </div>
                                <!-- EXAMINAR ARCHIVO -->
                                <div class="col-md-3 mb-3">
                                  <label for="subir_factura">Subir Archivo</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupSubirFactura"> <i class="far fa-id-card"></i> </span>
                                    </div>
                                    <input type="file" class="form-control" id="subir_factura" accept=".pdf, .doc, .jpg, .png" value="Examinar" aria-describedby="inputGroupSubirFactura" required>
                                  </div>
                                </div>
                                <!-- MERCADERIA-->
                                <div class="col-md-3 mb-3 ">
                                  <label for="mercaderia">Mercaderia</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupMercaderia"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <select class="custom-select " id="mercaderia" aria-describedby="inputGroupMercaderia" required>
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
                                <div class="col-md-4 mb-3">
                                  <label for="proveedor">Proveedor</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupProveedor"> <i class="far fa-id-card"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" id="proveedor" placeholder="Ingresa el Nombre" aria-describedby="inputGroupProveedor" required>
                                    <div class="input-group-prepend">
                                      <button class="btn btn-info" type="Submit">Buscar</button>
                                    </div>
                                  </div>
                                </div>
                                <!-- CONDICION DE PAGO-->
                                <div class="col-md-3 mb-3 ">
                                  <label for="condicion_pago">Condición de Pago</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupCondicionPago"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <select class="custom-select " id="condicion_pago" aria-describedby="inputGroupCondicionPago" required>
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
                                <div class="col-md-3 mb-3 ">
                                  <label for="medio_pago">Medio de Pago</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupMedioPago"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <select class="custom-select " id="medio_pago" aria-describedby="inputGroupMedioPago" required>
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
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupMoneda"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <select class="custom-select " id="moneda" aria-describedby="inputGroupMoneda" required>
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
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupCuentaEntrada"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <select class="custom-select " id="cta_ent" aria-describedby="inputGroupCuentaEntrada" required>
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
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupSubtotalFactura"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" id="subtotal_factura" placeholder="" aria-describedby="inputGroupSubtotalFactura" required>
                                  </div>
                                </div>
                                <!-- IGV-->
                                <div class="col-md-2 mb-3">
                                  <label for="igv_factura">Igv</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupIgvFactura"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" id="igv_factura" placeholder="" aria-describedby="inputGroupIgvFactura" required>
                                  </div>
                                </div>
                                <!-- TOTAL -->
                                <div class="col-md-3 mb-3">
                                  <label for="total_factura">Total</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupTotalFactura"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" id="total_factura" placeholder="" aria-describedby="inputGroupTotalFactura" required>
                                  </div>
                                </div>
                                <!-- ESTADO-->
                                <div class="col-md-2 mb-3 ">
                                  <label for="estado_compra">Estado</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupEstadoCompra"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <select class="custom-select " id="estado_compra" aria-describedby="inputGroupEstadoCompra" required>
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
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputObservacionPago"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <textarea class="form-control" id="observacion_pago" rows="5" aria-describedby="inputGroupObservacionPago" required></textarea>
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
                                <!-- CODIGO DE PAGO-->
                                <!-- <div class="col-md-2 mb-3">
                                  <label for="codigo_pago_voucher">Codigo</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupCodigoPagoVoucher"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" id="codigo_pago_voucher" value="" readonly="" placeholder="" aria-describedby="inputGroupCodigoPagoVoucher" required>
                                  </div>
                                </div> -->
                                <!-- VOUCHER -->
                                <div class="col-md-3 mb-3">
                                  <label for="voucher_pago">N° Voucher</label>
                                  <div class="input-group">

                                    <input type="text" class="form-control" id="voucher_pago" placeholder="N° Voucher" aria-describedby="inputGroupVoucherPago" required>
                                  </div>
                                </div>
                                <!-- TRANSACCIÓN-->
                                <div class="col-md-3 mb-3">
                                  <label for="transaccion">Transaccion</label>
                                  <div class="input-group">

                                    <select class="custom-select " id="transaccion" aria-describedby="inputGroupTransaccion" required>
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

                                    <input type="text" class="form-control" id="tipo_cambio" placeholder="Tipo de Cambio" aria-describedby="inputGroupTipoCambio" required>
                                  </div>
                                </div>
                              </div>
                              <!-- Segunda Fila -->
                              <div class="form-row align-items-center">
                                <!-- N° DEPOSITO -->
                                <div class="col-md-3 mb-3">
                                  <label for="numero_deposito">N° Deposito :</label>
                                  <div class="input-group">

                                    <input type="text" class="form-control" id="numero_deposito" placeholder="" aria-describedby="inputGroupNumeroDeposito" required>
                                  </div>
                                </div>
                                <!-- N° LETRA - CHEKE -->
                                <div class="col-md-3 mb-3">
                                  <label for="numero_letra_cheque">N° Letra / Cheque :</label>
                                  <div class="input-group">

                                    <input type="text" class="form-control" id="numero_letra_cheque" placeholder="" aria-describedby="inputGroupNumeroLetraCheque" required>
                                  </div>
                                </div>
                                <!-- BANCO-->
                                <div class="col-md-3 mb-3 ">
                                  <label for="banco">Banco</label>
                                  <div class="input-group">

                                    <select class="custom-select " id="banco" aria-describedby="inputGroupBanco" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_banco as $cbox_banco) : ?>
                                        <option value="<?php echo $cbox_banco->id_dmultitabla; ?>">
                                          <?php echo $cbox_banco->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>

                                <!-- MEDIO DE PAGO VOUCHER -->
                                <div class="col-md-3 mb-3 ">
                                  <label for="medio_pago_voucher">Medio de Pago</label>
                                  <div class="input-group">

                                    <select class="custom-select " id="medio_pago_voucher" aria-describedby="inputGroupMedioPagoVoucher" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_medio_pago_voucher as $cbox_medio_pago_voucher) : ?>
                                        <option value="<?php echo $cbox_medio_pago_voucher->id_dmultitabla; ?>">
                                          <?php echo $cbox_medio_pago_voucher->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                                <!-- MONEDA PAGO VOUCHER -->
                                <!-- <div class="col-md-2 mb-3 ">
                                  <label for="moneda_voucher">Moneda</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupMonedaVoucher"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <select class="custom-select " id="moneda_voucher" aria-describedby="inputGroupMonedaVoucher" required>
                                      <option value="0" selected>Selecciona...</option>
                                      <?php foreach ($cbox_moneda_voucher as $cbox_moneda_voucher) : ?>
                                        <option value="<?php echo $cbox_moneda_voucher->id_dmultitabla; ?>">
                                          <?php echo $cbox_moneda_voucher->descripcion; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div> -->
                                <!-- GIRADO A -->
                                <!-- <div class="col-md-4 mb-3">
                                  <label for="beneficiario_pago">Girado A :</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupBeneficiarioPago"> <i class="fas fa-user-shield"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" id="beneficiario_pago" placeholder="" aria-describedby="inputGroupBeneficiarioPago" required>
                                  </div>
                                </div>-->
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

                                    <select class="custom-select " id="moneda" aria-describedby="inputGroupEstadoVoucher" required>
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
                                    <th></th>
                                    <th></th>
                                    <th></th>
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
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>plantilla/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() ?>plantilla/dist/js/demo.js"></script>
  <!-- Page specific script -->

  <script src="<?php echo base_url() ?>plantilla/plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url() ?>plantilla/plugins/inputmask/jquery.inputmask.min.js"></script>
  <script src="<?php echo base_url(); ?>plantilla/plugins/alertify/alertify.js"></script>

  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>plantilla/plugins/DataTables/datatables.js"></script>

  <script>
    var base_url = "<?php echo base_url(); ?>";
  </script>

  <script src="<?php echo base_url() ?>application/js/j_compras.js"></script>

  </body>

  </html>