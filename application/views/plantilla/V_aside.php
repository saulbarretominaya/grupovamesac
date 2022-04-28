  <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center><a class="brand-link" style="text-decoration:none">
        <span class="brand-text font-weight-light"> <?php echo $this->session->userdata("ds_accesos_empresas") ?></span>
      </a></center>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fab fa-hive"></i>
              <p>
                Recursos Humanos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_trabajadores" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trabajadores</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_clientes_proveedores" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes - Proveedores</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-border-none"></i>
              <p>
                Multitablas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_multitablas" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar tabla</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-luggage-cart"></i>
              <p>
                Logistica
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_orden_compras" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orden de compra</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-truck"></i>
              <p>
                Almacen
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_productos" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_salida_productos" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salida Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_tableros" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tableros</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_carga_inicial" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Carga Inicial</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-chart-line"></i>
              <p>
                Finanzas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_compras_cobranzas" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compras / Cobranzas</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-dollar-sign"></i>
              <p>
                Tipo de cambio
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_tipo_cambio" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipo de cambio</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="" class="nav-link">

              <i class="fas fa-cart-arrow-down"></i>
              <p>
                Comercial
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_cotizacion" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cotizacion</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_comodin" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comodin</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-paste"></i>
              <p>
                Orden de despacho
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_orden_despacho" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orden de despacho</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_elaborar_pc" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Elaborar P/C</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_parciales_completas" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Parciales / Completas</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-clipboard-list"></i>
              <p>
                Guia de remision
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_guia_remision" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guia de remision</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-tasks"></i>
              <p>
                Comprobantes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_comprobantes" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comprobantes</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_comprobantes" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notas Credito / Debito</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-file-medical-alt"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "#" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reportes</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">

              <i class="fas fa-users-cog"></i>
              <p>
                Administracion
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_usuarios" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>