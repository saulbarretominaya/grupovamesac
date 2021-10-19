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

  <!-- PRUEBA PREUBA PRUEBA -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="card">
            <div class="card-body">
              <form>
                <div class="form-row">
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
                          <!-- APELLIDO PATERNO -->
                          <!-- <div class="form-row">
                            <div class="col-md-6 mb-3">
                              <label for=""> Apellido Paterno : </label>
                            </div>
                            <div class="col-md-6 mb-3">
                              <label for=""> <?php echo $detalle->ape_paterno; ?></label>
                            </div>
                          </div> -->
                          <!-- APELLIDO MATERNO -->
                          <!-- <div class="form-row">
                            <div class="col-md-6 mb-3">
                              <label for=""> Apellido Materno : </label>
                            </div>
                            <div class="col-md-6 mb-3">
                              <label for=""><?php echo $detalle->ape_materno; ?></label>
                            </div>
                          </div> -->
                          <!-- EMAIL -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Email </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php echo $detalle->email; ?>
                            </div>
                          </div>
                          <!-- FECHA NACIMIENTO -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Fecha de Nacimiento </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php echo date("d/m/Y", strtotime((str_replace('-', '/', $detalle->fecha_nacimiento)))) ?>
                            </div>
                          </div>
                          <!-- NACIONALIDAD -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Nacionalidad</label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_nacionalidad as $cbox_nacionalidad) : ?>
                                <?php if ($cbox_nacionalidad->id_dmultitabla == $detalle->id_nacionalidad) : ?>
                                  <?php echo $cbox_nacionalidad->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                          <!-- ESTADO CIVIL -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label class="" for=""> Estado Civil </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_estado_civil as $cbox_estado_civil) : ?>
                                <?php if ($cbox_estado_civil->id_dmultitabla == $detalle->id_est_civil) : ?>
                                  <?php echo $cbox_estado_civil->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                          <!-- GRADO INSTRUCCION -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Grado de Instruccion </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_grado_instruccion as $cbox_grado_instruccion) : ?>
                                <?php if ($cbox_grado_instruccion->id_dmultitabla == $detalle->id_grado_instruccion) : ?>
                                  <?php echo $cbox_grado_instruccion->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                  <!-- DATOS DE LA EMPRESA-->
                  <div class="col-md-12 mb-3">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Datos de la Empresa</h3>
                      </div>
                      <div class="card-body">
                        <form>
                          <!--ID TRABAJADOR-->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Codigo </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php echo $detalle->id_trabajador; ?>
                            </div>
                          </div>
                          <!--TIPO TRABAJADOR-->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Tipo de Trabajador </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_tipo_trabajador as $cbox_tipo_trabajador) : ?>
                                <?php if ($cbox_tipo_trabajador->id_dmultitabla == $detalle->id_tipo_trabajador) : ?>
                                  <?php echo $cbox_tipo_trabajador->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                          <!-- LOCAL -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for="">Almacen </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_almacen as $cbox_almacen) : ?>
                                <?php if ($cbox_almacen->id_dmultitabla == $detalle->id_almacen) : ?>
                                  <?php echo $cbox_almacen->descripcion ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </div>
                          </div>
                          <!-- CARGO -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Cargo del Trabajador </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php foreach ($cbox_cargo_trabajador as $cbox_cargo_trabajador) : ?>
                                <?php if ($cbox_cargo_trabajador->id_dmultitabla == $detalle->id_cargo_trabajador) : ?>
                                  <?php echo $cbox_cargo_trabajador->descripcion ?>
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
                  <!-- UBIGEO-->
                  <div class="col-md-12 mb-3">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Ubigeo</h3>
                      </div>
                      <div class="card-body">
                        <form>
                          <!--LUGAR DE NACIMIENTO-->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Lugar de Nacimiento </label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php echo $detalle->lugar_nacimiento; ?>
                            </div>
                          </div>
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

                          <!-- DOMICILIO ACTUAL -->
                          <div class="form-row">
                            <div class="col-md-5 mb-3">
                              <label for=""> Domicilio Actual</label>
                            </div>
                            <div class="col-md-7 mb-3">
                              <?php echo $detalle->domicilio; ?>
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