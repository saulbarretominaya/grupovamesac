  <!-- PROBAMOS -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="card card-info">

            <form>
              <div class="form-row">
                <div class="col-md-6 ">
                  <div class="input-group">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_S6w9eNX3jtyzwNk5LwnkomXSVidGe64PhONqh-4eiD9jM8ayLUwBO10GmVH7WKDapIA&usqp=CAU" alt="Cinque Terre" />
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="col-12">
                    <br>
                    <b>GRUPO VAME SAC</b><br><br>
                    Av. Proceres 316 Int.2 Urb.Condevilla Señor - San Martin de Porres - Lima - Lima <br>
                    Telefonos: (01) 496 88 31 / 960 430 277<br>
                    Email: contabilidad@vamesac.pe<br>
                    Tienda: Av.Pacasmayo 403 - Pabellon I - Puesto 7 C.C
                    Página web:<a href="#"> grupovamesac.com</a>
                  </div>
                </div>
              </div>
            </form>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
    <!-- /.div -->
  </section>

  <?php
  $datos = $detalle->nombres . " " . $detalle->ape_paterno . " " . $detalle->ape_materno
  ?>

  <!-- DETALLE DE TRABAJADORES LOCAL -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="card">
            <div class="card-body">
              <form>
                <div class="form-row">
                  <!-- DATOS DE LA EMPRESA-->
                  <div class="col-md-12 mb-3">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Datos de la Empresa</h3>
                      </div>
                      <div class="card-body">
                        <form>
                          <!-- ID TRABAJADOR
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Codigo </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php echo $detalle->id_trabajador; ?>
                            </div>
                          </div> -->
                          <!--TIPO DE PERSONA-->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Tipo de Persona </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_tipo_persona as $cbox_tipo_persona) : ?>
                                <?php if ($cbox_tipo_persona->id_dmultitabla == $detalle->id_tipo_persona) : ?>
                                  <?php echo $cbox_tipo_persona->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                          <!-- TIPO DE PERSONA SUNAT -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for="">Tipo de Persona Sunat </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_tipo_persona_sunat as $cbox_tipo_persona_sunat) : ?>
                                <?php if ($cbox_tipo_persona_sunat->id_dmultitabla == $detalle->id_tipo_persona_sunat) : ?>
                                  <?php echo $cbox_tipo_persona_sunat->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                          <!-- CONDICION -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Condicion de la Persona </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_condicion as $cbox_condicion) : ?>
                                <?php if ($cbox_condicion->id_dmultitabla == $detalle->id_condicion) : ?>
                                  <?php echo $cbox_condicion->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                          <!-- TIPO DE DOCUMENTO -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Tipo de Documento </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_tipo_documento as $cbox_tipo_documento) : ?>
                                <?php if ($cbox_tipo_documento->id_dmultitabla == $detalle->id_tipo_documento) : ?>
                                  <?php echo $cbox_tipo_documento->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                          <!-- NUMERO DE DOCUMENTO-->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Numero de Documento </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php echo $detalle->num_documento ?>
                            </div>
                          </div>

                        </form>
                      </div>

                    </div>
                  </div>
                  <!-- DATOS PERSONALES-->
                  <div class="col-md-12 mb-3">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Datos Personales</h3>
                      </div>
                      <div class="card-body">
                        <form>
                          <!--NOMBRE-->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Nombre y Apellidos</label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php echo $datos ?>
                            </div>
                          </div>
                          <!-- EMAIL -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Email </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php echo $detalle->email; ?>
                            </div>
                          </div>
                          <!-- RAZON SOCIAL-->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Razon Social </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php echo $detalle->razon_social; ?>
                            </div>
                          </div>
                          <!-- ORIGEN -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Origen</label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_origen as $cbox_origen) : ?>
                                <?php if ($cbox_origen->id_dmultitabla == $detalle->id_origen) : ?>
                                  <?php echo $cbox_origen->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                          <!-- DIRECCION FISCAL -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Direccion Fiscal </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php echo $detalle->direccion_fiscal; ?>
                            </div>
                          </div>
                          <!-- DIRECCION ALMACEN 1 -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Direccion Almacen 1 </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php echo $detalle->direccion_alm1; ?>
                            </div>
                          </div>
                          <!-- DIRECCION ALMACEN 2 -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Direccion Almacen 2 </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php echo $detalle->direccion_alm2; ?>
                            </div>
                          </div>
                          <!-- Linea de Disponible -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for="">Linea Disponible</label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_linea_disponible as $cbox_linea_disponible) : ?>
                                <?php if ($cbox_linea_disponible->id_dmultitabla == $detalle->id_linea_disponible) : ?>
                                  <?php echo $cbox_linea_disponible->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>

                  <!-- UBIGEO-->
                  <div class="col-md-12 mb-3">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Ubigeo</h3>
                      </div>
                      <div class="card-body">
                        <form>
                          <!--DEPARTAMENTO-->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Departamento </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_departamento as $cbox_departamento) : ?>
                                <?php if ($cbox_departamento->id_dmultitabla == $detalle->id_departamento) : ?>
                                  <?php echo $cbox_departamento->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                          <!-- PROVINCIA -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for="">Provincia </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_provincia as $cbox_provincia) : ?>
                                <?php if ($cbox_provincia->id_dmultitabla == $detalle->id_provincia) : ?>
                                  <?php echo $cbox_provincia->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                          <!-- DISTRITO -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Distrito</label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_distrito as $cbox_distrito) : ?>
                                <?php if ($cbox_distrito->id_dmultitabla == $detalle->id_distrito) : ?>
                                  <?php echo $cbox_distrito->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
              </form>

              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
    <!-- /.div -->
  </section>


  <!-- <div class="row">
    <div class="col-xs-12">

    </div>
  </div> -->

  <div class="row">
    <div class="modal-footer">
      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><span class="fa fa-reply"> CERRAR</span></button>
      <!-- <a href="<?php echo base_url(); ?>Reportes/Ventas/Controller_reportes/reporte_modal/<?php echo $cabecera->id_venta; ?>" class="btn btn-primary" download=""><span class="fa fa-print"></span> DESCARGAR VENTA</a> -->
    </div>
  </div>