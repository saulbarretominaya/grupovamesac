  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cotizacion
              <a href="<?php echo base_url(); ?>C_cotizacion/enlace_registrar" class="btn btn-primary btn-sm">REGISTRAR</a>
            </h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table id="id_datatable_productos" class="table table-sm table-hover" style="width: 100%;">
              <thead style="background-color: #9fa53b; color: white;">
                <tr>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>U.M</th>
                  <th>Marca</th>
                  <th>Grupo</th>
                  <th>Moneda</th>
                  <th>Precio Costo</th>
                  <th>Precio Venta</th>
                  <th>Stock</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($index)) : ?>
                  <?php foreach ($index as $index) : ?>
                    <tr>
                      <td><?php echo $index->codigo_producto; ?></td>
                      <td><?php echo $index->descripcion_producto; ?></td>
                      <td><?php echo $index->ds_unidad_medida; ?></td>
                      <td><?php echo $index->ds_marca; ?></td>
                      <td><?php echo $index->ds_grupo; ?></td>
                      <td><?php echo $index->ds_moneda; ?></td>
                      <td><?php echo $index->precio_costo; ?></td>
                      <td><?php echo $index->precio_venta; ?></td>
                      <td><?php echo $index->stock; ?></td>
                      <td><a class="btn btn-primary btn-xs"><span class="fas fa-search-plus"></span></a></td>
                      <td><a href="<?php echo base_url(); ?>C_productos/enlace_actualizar/<?php echo $index->id_producto; ?>" class="btn bg-navy btn-xs"><span class="far fa-edit"></span></a></td>
                     
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.div -->
    </section>
  </div>