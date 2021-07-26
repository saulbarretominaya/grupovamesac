  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trabajadores
              <button type="button" class="btn btn-primary" id="registrar">REGISTRAR</button>
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
                <h2 class="card-title">Registro de Trabajadores</h3>
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

                        <!--  -->

                        <div class="col-md-3 mb-3">
                          <label for="TipoTrabajador">Tipo Trabajador</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupTipoTrabajador"> <i class="fas fa-user-shield"></i> </span>
                            </div>

                            <select class="custom-select " id="TipoTrabajador" aria-describedby="inputGroupTipoTrabajador" required>
                              <option selected>Selecciona...</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>

                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3 mb-3">
                          <label for="local">Local</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupLocal"> <i class="fas fa-user-shield"></i> </span>
                            </div>

                            <select class="custom-select " id="local" aria-describedby="inputGroupLocal" required>
                              <option selected>Seleciona...</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>

                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3 mb-3">
                          <label for="cargo">Cargo</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupCargo"> <i class="fas fa-user-shield"></i> </span>
                            </div>

                            <select class="custom-select " id="cargo" aria-describedby="inputGroupCargo" required>
                              <option selected>Selecciona...</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>

                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3 mb-3">
                          <label for="sexo">Sexo</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupSexo"> <i class="fas fa-user-shield"></i> </span>
                            </div>

                            <select class="custom-select " id="sexo" aria-describedby="inputGroupSexo" required>
                              <option selected>Selecciona...</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>

                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>



                      </div>

                      <!-- Segunda Fila -->

                      <div class="form-row align-items-center">

                        <div class="col-md-4 ">
                          <label for="tdocumento">Tipo Documento</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupTdocumento"> <i class="fas fa-user-shield"></i> </span>
                            </div>

                            <select class="custom-select " id="tdocumento" aria-describedby="inputGroupTdocumento" required>
                              <option selected>Selecciona...</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>

                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4 ">
                          <label for="ndocumento">Numero Documento</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupNdocumento"> <i class="far fa-id-card"></i> </span>
                            </div>
                            <input type="text" class="form-control" id="ndocumento" placeholder="Ingresa el N° Documento" aria-describedby="inputGroupNdocumento" required>
                            <div class="input-group-prepend">
                              <button class="btn btn-info" type="Submit">Buscar ( Consular Reniec)</button>
                              <!-- <span class="input-group-text" id="inputGroupNdocumento"> <i class="far fa-id-card"></i> </span> -->
                            </div>
                            <div class="valid-feedback">
                              Se ve bien!
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
                        <div class="col-md-4 mb-3">
                          <label for="nombres">Nombres</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupNombres"> <i class="fas fa-user-shield"></i> </span>
                            </div>
                            <input type="text" class="form-control" id="nombres" placeholder="Nombres" aria-describedby="inputGroupNombres" required>
                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="apePaterno">Apellido Paterno</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupApePaterno"> <i class="far fa-id-card"></i> </span>
                            </div>
                            <input type="text" class="form-control" id="apePaterno" placeholder="Apellido Paterno" aria-describedby="inputGroupApePaterno" required>
                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="apeMaterno">Apellido Materno</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupApeMaterno"> <i class="far fa-id-card"></i> </span>
                            </div>
                            <input type="text" class="form-control" id="apeMaterno" placeholder="Apellido Materno" aria-describedby="inputGroupApeMaterno" required>
                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Segunda Fila -->

                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="correo">Correo</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupCorreo"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="text" class="form-control" id="correo" placeholder="Correo" aria-describedby="inputGroupCorreo" required>
                            <div class="invalid-feedback">
                              Ingrese el correo electronico.
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="fechaNac">Fecha Nacimiento</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupfechaNac"> <i class="far fa-calendar-alt"></i> </span>
                            </div>
                            <input type="text" class="form-control" id="fechaNac" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>

                      </div>

                      <!-- Tercera Fila de DATOS PERSONALES -->

                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="nacionalidad">Nacionalidad</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupNacionalidad"> <i class="fas fa-user-shield"></i> </span>
                            </div>

                            <select class="custom-select " id="nacionalidad" aria-describedby="inputGroupNacionalidad" required>
                              <option selected>Selecciona...</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>

                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="estadoCivil">Estado Civil</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupEstadoCivil"> <i class="fas fa-user-shield"></i> </span>
                            </div>

                            <select class="custom-select " id="estadoCivil" aria-describedby="inputGroupEstadoCivil" required>
                              <option selected>Seleciona...</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>

                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="gradoInstruccion">Grado Instruccion</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupGradoInstruccion"> <i class="fas fa-user-shield"></i> </span>
                            </div>

                            <select class="custom-select " id="gradoInstruccion" aria-describedby="inputGroupGradoInstruccion" required>
                              <option selected>Selecciona...</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>

                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
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

                      <div class="form-row">
                        <div class="col-md-8 mb-3">
                          <label for="lnacimiento">Lugar de Nacimiento</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupLugarNacimiento"> <i class="fas fa-user-shield"></i> </span>
                            </div>
                            <input type="text" class="form-control" id="lnacimiento" placeholder="Lugar de Nacimiento" aria-describedby="inputGroupLugarNacimiento" required>
                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="departamento">Departamento</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupDepartamento"> <i class="fas fa-user-shield"></i> </span>
                            </div>

                            <select class="custom-select " id="departamento" aria-describedby="inputGroupDepartamento" required>
                              <option selected>Selecciona...</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>

                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Segunda Fila -->

                      <div class="form-row">
                        <div class="col-md-8 mb-3">
                          <label for="domicilio">Domicilio Actual</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupDomicilio"> <i class="fas fa-user-shield"></i> </span>
                            </div>
                            <input type="text" class="form-control" id="domicilio" placeholder="Domicilio Actual" aria-describedby="inputGroupDomicilio" required>
                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="provincia">Provincia</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupProvincia"> <i class="fas fa-user-shield"></i> </span>
                            </div>

                            <select class="custom-select " id="provincia" aria-describedby="inputGroupProvincia" required>
                              <option selected>Selecciona...</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>

                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-12 mb-3">
                          <label for="referencia">Refencia</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupReferencia"> <i class="fas fa-user-shield"></i> </span>
                            </div>
                            <input type="text" class="form-control" id="referencia" placeholder="Ingresa la Referencia" aria-describedby="inputGroupReferencia" required>
                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="form-row">

                        <div class="col-md-4 mb-3">
                          <label for="telefono">Telefono</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupTelefono"> <i class="fas fa-phone-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>



                        <div class="col-md-4 mb-3">
                          <label for="celular">Celular</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupCelular"> <i class="fas fa-mobile-alt"></i> </span>
                            </div>
                            <input type="text" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="distrito">Distrito</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupDistrito"> <i class="fas fa-user-shield"></i> </span>
                            </div>

                            <select class="custom-select " id="distrito" aria-describedby="inputGroupDistrito" required>
                              <option selected>Selecciona...</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>

                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>


                      </div>

                      <button class="btn btn-primary" type="submit">Registrar</button>



                    </form>

                  </div>
                </div>


                <div class="card-footer clearfix">
                  <button  class="btn btn-primary float-right" type="submit" ><i class="fas fa-plus"></i> REGISTAR</button>
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>



          <!-- <div class="col-md-12"> -->
          <!-- Horizontal Form -->
          <!-- <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Detalle Trabajadores</h3>
              </div> -->
          <!-- /.card-header -->
          <!-- form start -->
          <!-- <form class="form-horizontal">
                <div class="card-body">
                  <table id="id_table_detalle_multitablas" class="table table-sm table-hover">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    </tbody>
                  </table>
                </div> -->
          <!-- /.card-body -->
          <!-- </form>
            </div> -->
          <!-- /.card -->

          <!-- </div> -->


        </div>
        <!-- /.row -->
      </div>


      <!-- /.div -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->