  <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?php echo base_url() ?>plantilla/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Recursos humanos -->
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
                  <p>Registrar Trabajadores</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_clientes_proveedores" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar Clientes</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- fin de recursos humanos -->

          <!-- multitablas -->
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
          <!-- fin de multitablas -->

          <!-- Logistica-->
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
                <a href="<?php echo base_url() . "#" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orden de compra</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- fin logistica-->

          <!-- almacen -->
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
                <a href="<?php echo base_url() . "C_tableros" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tableros</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- fin de almacen -->

          <!-- tipo de cambio -->
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-chart-line"></i>
              <p>
                Tipo de cambio
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "#" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipo de cambio</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- fin de tipo de cambio-->

          <!--comercial -->
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
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_compras" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compras</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- fin de comercial -->

          <!-- orden despacho-->
          <!-- <li class="nav-item">
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
          </li> -->
          <!-- fin de orden de despacho-->

          <!-- guia  de remision-->
          <!-- <li class="nav-item">
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
                  <p>Pre guia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_orden_despacho" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guia de remision</p>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- fin guia de remisi??n-->

          <!-- facturacion-->
          <!-- <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-tasks"></i>
              <p>
                Facturacion
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "C_facturacion" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Facturacion</p>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- fin guia de remisi??n-->

          <!-- Reporte-->
          <!-- <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-file-medical-alt"></i>
              <p>
                Reporte
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() . "#" ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte</p>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- fin reporte-->


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>