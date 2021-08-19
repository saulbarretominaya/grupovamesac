<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cliente/Proveedor
            <button type="button" class="btn btn-warning btn-sm" id="actualizar_clientes_proveedores">ACTUALIZAR</button>
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
              <h2 class="card-title">Registro de Clientes</h3>
            </div>
            <div class="card-body">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Informacion Definir</h3>
                </div>
                <div class="card-body">
                  <form class="needs-validation" novalidate>
                    <!-- Esta Parte es la de los Combobox -->
                    <div class="form-row">
                      <!-- ID CLIENTE/PROVEEDOR -->
                      <div class="col-md-4 mb-3">
                        <label for="id_cliente_proveedor">Codigo</label>
                        <div class="form-group">
                          <input type="text" class="form-control" id="id_cliente_proveedor" value="<?php echo $enlace_actualizar->id_cliente_proveedor; ?>" readonly="">
                        </div>
                      </div>
                      <!-- ORIGEN -->
                      <div class="col-md-4 mb-3">
                        <label for="origen">Origen</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupOrigen"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="origen" aria-describedby="inputGroupOrigen" required>
                            <option value="0" selected>Selecciona...</option>
                            <?php foreach ($cbox_origen as $cbox_origen) : ?>
                              <?php if ($cbox_origen->id_dmultitabla == $enlace_actualizar->id_origen) : ?>
                                <option value="<?php echo $cbox_origen->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_origen->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_origen->id_dmultitabla; ?>">
                                  <?php echo $cbox_origen->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <!-- CONDICION -->
                      <div class="col-md-4 mb-3">
                        <label for="condicion">Condicion</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupCondicion"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="condicion" aria-describedby="inputGroupCondicion" required>
                            <option value="0" selected>Selecciona...</option>
                            <?php foreach ($cbox_condicion as $cbox_condicion) : ?>
                              <?php if ($cbox_condicion->id_dmultitabla == $enlace_actualizar->id_condicion) : ?>
                                <option value="<?php echo $cbox_condicion->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_condicion->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_condicion->id_dmultitabla; ?>">
                                  <?php echo $cbox_condicion->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Segunda Fila -->
                    <div class="form-row align-items-center">
                      <!-- TIPO DE PERSONA -->
                      <div class="col-md-3 ">
                        <label for="tipo_persona">Tipo Persona</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupTipoPersona"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="tipo_persona" aria-describedby="inputGroupTipoPersona" required>
                            <option value="0" selected>Selecciona...</option>
                            <?php foreach ($cbox_tipo_persona as $cbox_tipo_persona) : ?>
                              <?php if ($cbox_tipo_persona->id_dmultitabla == $enlace_actualizar->id_tipo_persona) : ?>
                                <option value="<?php echo $cbox_tipo_persona->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_tipo_persona->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_tipo_persona->id_dmultitabla; ?>">
                                  <?php echo $cbox_tipo_persona->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <!-- TIPO PERSONA SUNAT -->
                      <div class="col-md-4 ">
                        <label for="tipo_persona_sunat">Tipo Persona Sunat</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupTpersonaSunat"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="tipo_persona_sunat" aria-describedby="inputGroupTpersonaSunat" required>
                            <option value="0" selected>Selecciona...</option>
                            <?php foreach ($cbox_tipo_persona_sunat as $cbox_tipo_persona_sunat) : ?>
                              <?php if ($cbox_tipo_persona_sunat->id_dmultitabla == $enlace_actualizar->id_tipo_persona_sunat) : ?>
                                <option value="<?php echo $cbox_tipo_persona_sunat->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_tipo_persona_sunat->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_tipo_persona_sunat->id_dmultitabla; ?>">
                                  <?php echo $cbox_tipo_persona_sunat->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <!-- TIPO DOCUMENTO -->
                      <div class="col-md-2 ">
                        <label for="tipo_documento">Tipo Documento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupTdocumento"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="tipo_documento" aria-describedby="inputGroupTdocumento" required>
                            <option value="0" selected>Selecciona...</option>
                            <?php foreach ($cbox_tipo_documento as $cbox_tipo_documento) : ?>
                              <?php if ($cbox_tipo_documento->id_dmultitabla == $enlace_actualizar->id_tipo_documento) : ?>
                                <option value="<?php echo $cbox_tipo_documento->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_tipo_documento->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_tipo_documento->id_dmultitabla; ?>">
                                  <?php echo $cbox_tipo_documento->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <!-- NUMERO DE DOCUMENTO -->
                      <div class="col-md-3 ">
                        <label for="num_documento">Numero Documento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupNdocumento"> <i class="far fa-id-card"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="num_documento" value="<?php echo $enlace_actualizar->num_documento; ?>" data-masked="" data-inputmask=" 'mask' : '99999999'" placeholder="Ingresa el N° Documento" aria-describedby="inputGroupNdocumento" required>
                          <div class="input-group-prepend">
                            <button class="btn btn-info" type="Submit">Buscar</button>
                            <!-- <span class="input-group-text" id="inputGroupNdocumento"> <i class="far fa-id-card"></i> </span> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Segundo Card -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Datos Personales</h3>
                </div>
                <div class="card-body">
                  <form class="needs-validation" novalidate>
                    <div class="form-row">
                      <!-- NOMBRES -->
                      <div class="col-md-4 mb-3">
                        <label for="nombres">Nombres</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupNombres"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="nombres" placeholder="Nombres" aria-describedby="inputGroupNombres" value="<?php echo $enlace_actualizar->nombres; ?>" required>
                        </div>
                      </div>
                      <!-- APELLIDO PATERNO -->
                      <div class="col-md-4 mb-3">
                        <label for="ape_paterno">Apellido Paterno</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupApePaterno"> <i class="far fa-id-card"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="ape_paterno" placeholder="Apellido Paterno" aria-describedby="inputGroupApePaterno" value="<?php echo $enlace_actualizar->ape_paterno; ?>" required>
                        </div>
                      </div>
                      <!-- APELLIDO MATERNO -->
                      <div class="col-md-4 mb-3">
                        <label for="ape_materno">Apellido Materno</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupApeMaterno"> <i class="far fa-id-card"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="ape_materno" placeholder="Apellido Materno" aria-describedby="inputGroupApeMaterno" value="<?php echo $enlace_actualizar->ape_materno; ?>" required>
                        </div>
                      </div>
                    </div>
                    <!-- Segunda Fila -->
                    <div class="form-row">
                      <!-- RAZON SOCIAL -->
                      <div class="col-md-6 mb-3">
                        <label for="razon_social">Razon Social</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupRazonSocial"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="razon_social" placeholder="Razon Social" aria-describedby="inputGroupLugarNacimiento" value="<?php echo $enlace_actualizar->razon_social; ?>" required>
                        </div>
                      </div>
                      <!-- DIRECCION FISCAL -->
                      <div class="col-md-6 mb-3">
                        <label for="direccion_fiscal">Direccion Fiscal</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupDireccionFiscal"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="direccion_fiscal" placeholder="Direccion Fiscal" aria-describedby="inputGroupDireccionFiscal" value="<?php echo $enlace_actualizar->direccion_fiscal; ?>" required>
                        </div>
                      </div>
                    </div>
                    <!-- Tercera Fila de DATOS PERSONALES -->
                    <div class="form-row">
                      <!-- DIRECCION ALTERNA 1 -->
                      <div class="col-md-6 mb-3">
                        <label for="direccion_alm1">Direccion Almacen 1</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupDireccionAlmacen1"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="direccion_alm1" placeholder="Direccion Almacen 1" aria-describedby="inputGroupDireccionAlmacen1" value="<?php echo $enlace_actualizar->direccion_alm1; ?>" required>
                        </div>
                      </div>
                      <!-- DIRECCION ALTERNA 2 -->
                      <div class="col-md-6 mb-3">
                        <label for="direccion_alm2">Direccion Almacen 2</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupDireccionAlmacen2"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="direccion_alm2" placeholder="Direccion Almacen 2" aria-describedby="inputGroupDireccionAlmacen2" value="<?php echo $enlace_actualizar->direccion_alm2; ?>" required>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Tercer Card -- UBIGEO -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Ubigeo</h3>
                </div>
                <div class="card-body">
                  <form class="needs-validation" novalidate>
                    <!-- Primera Fila -->
                    <div class="form-row">
                      <!-- DEPARTAMENTO -->
                      <div class="col-md-4 mb-3">
                        <label for="departamento">Departamento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupDepartamento"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="departamento" aria-describedby="inputGroupDepartamento" required>
                            <option value="0" selected>Selecciona...</option>
                            <?php foreach ($cbox_departamento as $cbox_departamento) : ?>
                              <?php if ($cbox_departamento->id_dmultitabla == $enlace_actualizar->id_departamento) : ?>
                                <option value="<?php echo $cbox_departamento->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_departamento->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_departamento->id_dmultitabla; ?>">
                                  <?php echo $cbox_departamento->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <!-- PROVINCIA-->
                      <div class="col-md-4 mb-3">
                        <label for="provincia">Provincia</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupProvincia"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="provincia" aria-describedby="inputGroupProvincia" required>
                            <option value="0" selected>Selecciona...</option>
                            <?php foreach ($cbox_provincia as $cbox_provincia) : ?>
                              <?php if ($cbox_provincia->id_dmultitabla == $enlace_actualizar->id_provincia) : ?>
                                <option value="<?php echo $cbox_provincia->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_provincia->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_provincia->id_dmultitabla; ?>">
                                  <?php echo $cbox_provincia->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <!-- DISTRITO -->
                      <div class="col-md-4 mb-3">
                        <label for="distrito">Distrito</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupDistrito"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="distrito" aria-describedby="inputGroupDistrito" required>
                            <option value="0" selected>Selecciona...</option>
                            <?php foreach ($cbox_distrito as $cbox_distrito) : ?>
                              <?php if ($cbox_distrito->id_dmultitabla == $enlace_actualizar->id_distrito) : ?>
                                <option value="<?php echo $cbox_distrito->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_distrito->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_distrito->id_dmultitabla; ?>">
                                  <?php echo $cbox_distrito->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <!-- Segunda Fila -->
                    <div class="form-row">
                      <!-- TELEFONO -->
                      <div class="col-md-4 mb-3">
                        <label for="telefono">Telefono</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupTelefono"> <i class="fas fa-phone-alt"></i></span>
                          </div>
                          <input type="text" class="form-control" id="telefono" data-inputmask='"mask": "(99) 999-9999"' value="<?php echo $enlace_actualizar->telefono; ?>" data-mask>
                        </div>
                      </div>
                      <!-- CELULAR -->
                      <div class="col-md-4 mb-3">
                        <label for="celular">Celular</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupCelular"> <i class="fas fa-mobile-alt"></i> </span>
                          </div>
                          <!-- <input type="text" class="form-control" id="celular" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask> -->
                          <input type="text" class="form-control" id="celular" data-inputmask="'mask': ['999999999', '+099 999 999 999']" value="<?php echo $enlace_actualizar->celular; ?>" data-mask>
                        </div>
                      </div>
                      <!-- TIPO DE GIRO -->
                      <div class="col-md-4 mb-3">
                        <label for="tipo_giro">Tipo de Giro</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupTipoGiro"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="tipo_giro" aria-describedby="inputGroupTipoGiro" required>
                            <option value="0" selected>Selecciona...</option>
                            <?php foreach ($cbox_tipo_giro as $cbox_tipo_giro) : ?>
                              <?php if ($cbox_tipo_giro->id_dmultitabla == $enlace_actualizar->id_tipo_giro) : ?>
                                <option value="<?php echo $cbox_tipo_giro->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_tipo_giro->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_tipo_giro->id_dmultitabla; ?>">
                                  <?php echo $cbox_tipo_giro->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Tercera Fila -->
                    <div class="form-row">
                      <!--CONDICION DE PAGO -->
                      <div class="col-md-4 mb-3">
                        <label for="condicion_pago">Condicion de Pago</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupCondicionPago"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="condicion_pago" aria-describedby="inputGroupCondicionPago" required>
                            <option value="0" selected>Selecciona...</option>
                            <?php foreach ($cbox_condicion_pago as $cbox_condicion_pago) : ?>
                              <?php if ($cbox_condicion_pago->id_dmultitabla == $enlace_actualizar->id_condicion_pago) : ?>
                                <option value="<?php echo $cbox_condicion_pago->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_condicion_pago->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_condicion_pago->id_dmultitabla; ?>">
                                  <?php echo $cbox_condicion_pago->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <!-- VENDEDOR -->
                      <!-- <div class="col-md-8 mb-3">
                          <label for="vendedor">Vendedor</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupVendedor"> <i class="fas fa-user-shield"></i> </span>
                            </div>
                            <select class="custom-select " id="vendedor" aria-describedby="inputGroupVendedor" required>
                              <option value="0" selected>Selecciona...</option>
                              <?php foreach ($cbox_vendedor as $cbox_vendedor) : ?>
                                <option value="<?php echo $cbox_tipo_persona->id_dmultitabla; ?>">
                                  <?php echo $cbox_vendedor->descripcion; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div> -->
                    </div>
                    <!-- Cuarta Fila -->
                    <div class="form-row">
                      <!-- LINEA DE CREDITO - SOLES -->
                      <div class="col-md-4 mb-3">
                        <label for="linea_credito_soles">Linea de Credito S/.</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupLineaCreditoSoles"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="linea_credito_soles" placeholder="Ingresa la Linea de Credito" aria-describedby="inputGroupLineaCreditoSoles" value="<?php echo $enlace_actualizar->linea_credito_soles; ?>" required>
                        </div>
                      </div>
                      <!-- CREDITO UNITARIO - SOLES-->
                      <div class="col-md-4 mb-3">
                        <label for="credito_unitario_soles">Credito Unitario S/.</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupCreditoUnitarioSoles"> <i class="far fa-id-card"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="credito_unitario_soles" placeholder="Ingresa el Credito Unitario" aria-describedby="inputGroupCreditoUnitarioSoles" value="<?php echo $enlace_actualizar->credito_unitario_soles; ?>" required>
                        </div>
                      </div>
                      <!-- DISPONIBLE - SOLES-->
                      <div class="col-md-4 mb-3">
                        <label for="disponible_soles">Disponible S/.</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupDisponibleSoles"> <i class="far fa-id-card"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="disponible_soles" placeholder="Ingrese la Disponibilidad" aria-describedby="inputGroupDisponibleSoles" value="<?php echo $enlace_actualizar->disponible_soles; ?>" required>
                        </div>
                      </div>
                    </div>

                    <!-- Quinta Fila -->
                    <div class="form-row">
                      <!-- LINEA DE CREDITO - DOLARES -->
                      <div class="col-md-4 mb-3">
                        <label for="linea_credito_dolares">Linea de Credito $ </label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupLineaCreditoDolares"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="linea_credito_dolares" placeholder="Ingresa la Linea de Credito" aria-describedby="inputGroupLineaCreditoDolares" value="<?php echo $enlace_actualizar->linea_credito_dolares; ?>" required>
                        </div>
                      </div>
                      <!-- CREDITO UNITARIO - DOLARES-->
                      <div class="col-md-4 mb-3">
                        <label for="credito_unitario_dolares">Credito Unitario $ </label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupCreditoUnitarioDolares"> <i class="far fa-id-card"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="credito_unitario_dolares" placeholder="Ingresa el Credito Unitario" aria-describedby="inputGroupCreditoUnitarioDolares" value="<?php echo $enlace_actualizar->credito_unitario_dolares; ?>" required>
                        </div>
                      </div>
                      <!-- DISPONIBLE - DOLARES-->
                      <div class="col-md-4 mb-3">
                        <label for="disponible_dolares">Disponible $ </label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupDisponibleDolares"> <i class="far fa-id-card"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="disponible_dolares" placeholder="Ingrese la Disponibilidad" aria-describedby="inputGroupDisponibleDolares" value="<?php echo $enlace_actualizar->disponible_dolares; ?>" required>
                        </div>
                      </div>
                    </div>
                    <!-- Sexta Fila -->
                    <div class="form-row">
                      <!-- LINEA OPCIONAL -->
                      <div class="col-md-4 mb-3">
                        <label for="linea_opcional">Linea Opcional </label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupLineaOpcional"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="linea_opcional" placeholder="Ingresa la Linea Opcional" aria-describedby="inputGroupLineaOpcinal" value="<?php echo $enlace_actualizar->linea_opcional; ?>" required>
                        </div>
                      </div>
                      <!-- LINEA OPCIONAL UNITARIO-->
                      <div class="col-md-4 mb-3">
                        <label for="linea_opcional_unitaria">Linea Opcional Unitario</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupCreditoUnitarioDolares"> <i class="far fa-id-card"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="linea_opcional_unitaria" placeholder="Ingresa la Linea Opcional Unitaria" aria-describedby="inputGroupLineaOpcionalUnitaria" value="<?php echo $enlace_actualizar->linea_opcional_unitaria; ?>" required>
                        </div>
                      </div>
                      <!-- LINEA DISPONIBLE-->
                      <div class="col-md-4 mb-3">
                        <label for="linea_disponible">Linea Disponible</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupLineaDisponible"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="linea_disponible" aria-describedby="inputGroupLineaDisponible" required>
                            <option value="0" selected>Selecciona...</option>
                            <?php foreach ($cbox_linea_disponible as $cbox_linea_disponible) : ?>
                              <?php if ($cbox_linea_disponible->id_dmultitabla == $enlace_actualizar->id_linea_disponible) : ?>
                                <option value="<?php echo $cbox_linea_disponible->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_linea_disponible->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_linea_disponible->id_dmultitabla; ?>">
                                  <?php echo $cbox_linea_disponible->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <!-- Septima Fila -->
                    <div class="form-row">
                      <!-- EMAIL -->
                      <div class="col-md-4 mb-3">
                        <label for="email">Correo</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupEmail"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="email" placeholder="Ingrese el correo electronico" aria-describedby="inputGroupEmail" value="<?php echo $enlace_actualizar->email; ?>" required>
                        </div>
                      </div>
                      <!-- CONTACTO REGISTRO-->
                      <div class="col-md-4 mb-3">
                        <label for="contacto_registro">Contacto Registro</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupContactoRegistro"> <i class="far fa-id-card"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="contacto_registro" placeholder="Ingrese el Contacto de Registro" aria-describedby="inputGroupContactoRegistro" value="<?php echo $enlace_actualizar->contacto_registro; ?>" required>
                        </div>
                      </div>
                      <!-- ESTADO-->
                      <div class=" col-md-4 mb-3">
                        <label for="estado_cliente">Estado</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupEstadoCliente"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="estado_cliente" aria-describedby="inputGroupEstadoCliente" required>
                            <option value="0" selected>Selecciona...</option>
                            <?php foreach ($cbox_departamento as $cbox_departamento) : ?>
                              <?php if ($cbox_departamento->id_dmultitabla == $enlace_actualizar->id_departamento) : ?>
                                <option value="<?php echo $cbox_departamento->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_departamento->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_departamento->id_dmultitabla; ?>">
                                  <?php echo $cbox_departamento->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Octava Fila -->
                    <div class="form-row">
                      <!-- EMAIL COBRANZA -->
                      <div class="col-md-4 mb-3">
                        <label for="email_cobranza">Email - Cobranza</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupEmailCobranza"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="email_cobranza" placeholder="Ingrese el correo de cobranza" aria-describedby="inputGroupEmailCobranza" value="<?php echo $enlace_actualizar->email_cobranza; ?>" required>
                        </div>
                      </div>
                      <!-- CONTACTO COBRANZA-->
                      <div class=" col-md-4 mb-3">
                        <label for="contacto_cobranza">Contacto Cobranza</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupContactoCobranza"> <i class="far fa-id-card"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="contacto_cobranza" placeholder="Ingrese el contacto de cobranza" aria-describedby="inputGroupContactoCobranza" value="<?php echo $enlace_actualizar->contacto_cobranza; ?>" required>
                        </div>
                      </div>
                      <!-- TIPO CLIENTE DE PAGO-->
                      <div class=" col-md-4 mb-3">
                        <label for="tipo_cliente_pago">Tipo de Cliente de Pago</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupTipoClientePago"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="tipo_cliente_pago" aria-describedby="inputGroupTipoClientePago" required>
                            <option value="0" selected>Selecciona...</option>
                            <?php foreach ($cbox_tipo_cliente_pago as $cbox_tipo_cliente_pago) : ?>
                              <?php if ($cbox_tipo_cliente_pago->id_dmultitabla == $enlace_actualizar->id_tipo_cliente_pago) : ?>
                                <option value="<?php echo $cbox_tipo_cliente_pago->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_tipo_cliente_pago->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_tipo_cliente_pago->id_dmultitabla; ?>">
                                  <?php echo $cbox_tipo_cliente_pago->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </form>
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

<script src="<?php echo base_url() ?>application/js/j_clientes_proveedores.js"></script>

</body>

</html>