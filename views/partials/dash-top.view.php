<div class="wrapper">

  <nav class="sidebar js-sidebar" id="sidebar">
    <div class="sidebar-content js-simplebar">
      <a class="sidebar-brand" href="index.html">
        <span class="sidebar-brand-text align-middle">AdminPiru</span>
      </a>
      <ul class="sidebar-nav">

        <li class="sidebar-item <?= $theme_path == "dashboard" ? 'active' : '' ?>">
          <a class="sidebar-link" href="<?= APP_URL ?>/controllers/dashboard.php">
            <i class="align-middle fa fa-dashboard"></i>
            <span class="align-middle">Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item <?= $theme_path == "pos" ? 'active' : '' ?>">
          <a class="sidebar-link" href="<?= APP_URL ?>/controllers/sales/pos.php">
            <i class="align-middle fa fa-th"></i>
            <span class="align-middle">CAJA</span>
          </a>
        </li>

        <li
          class="sidebar-item <?= $theme_path == "list_products" || $theme_path == "add_products" || $theme_path == "impor_products" ? 'active' : '' ?>">
          <a class="sidebar-link  <?= $theme_path == "list_products" || $theme_path == "add_products" || $theme_path == "impor_products" ? '' : 'collapsed' ?>"
            data-bs-target="#pages" data-bs-toggle="collapse">
            <i class="fa fa-barcode"></i>
            <span class="align-middle">Productos</span>
          </a>
          <ul
            class="sidebar-dropdown list-unstyled collapse <?= $theme_path == "list_products" || $theme_path == "add_products" || $theme_path == "impor_products" ? 'show' : '' ?>"
            id="pages" data-bs-parent="#sidebar">
            <li class="sidebar-item <?= $theme_path == "list_products" ? 'active' : '' ?>">
              <a class="sidebar-link" href="<?= APP_URL ?>/controllers/products/list.php">Lista de productos</a>
            </li>
            <!-- <li class="sidebar-item <?= $theme_path == "add_products" ? 'active' : '' ?>">
            <a class="sidebar-link" href="<?= APP_URL ?>/controllers/products/add.php">Agregar productos</a>
          </li> -->
            <li class="sidebar-item <?= $theme_path == "impor_products" ? 'active' : '' ?>">
              <a class="sidebar-link" href="<?= APP_URL ?>/controllers/products/impor.php">Importar productos</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse">
            <i class="fa fa-folder"></i>
            <span class="align-middle">Categoria</span>
          </a>
          <ul class="sidebar-dropdown list-unstyled collapse" id="auth" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a class="sidebar-link" href="#">Listar categoria</a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#">Agregar categoria</a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#">Importar categoria</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item <?= $theme_path == "list_sales" ? 'active' : '' ?>">
          <a class="sidebar-link <?= $theme_path == "list_sales" ? '' : 'collapsed' ?>" data-bs-target="#errors"
            data-bs-toggle="collapse">
            <i class="fa fa-shopping-cart"></i>
            <span class="align-middle">Ventas</span>
          </a>
          <ul class="sidebar-dropdown list-unstyled collapse <?= $theme_path == "list_sales" ? 'show' : '' ?>"
            id="errors" data-bs-parent="#sidebar">
            <li class="sidebar-item <?= $theme_path == "list_sales" ? 'active' : '' ?>">
              <a class="sidebar-link" href="<?= APP_URL ?>/controllers/sales/list.php">Listar ventas</a>
            </li>
            <!-- <li class="sidebar-item">
              <a class="sidebar-link" href="#">Listar cuentas abiertas</a>
            </li> -->
          </ul>
        </li>

        <li class="sidebar-item <?= $theme_path == "add_purchases" ? 'active' : '' ?>">
          <a class="sidebar-link <?= $theme_path == "add_purchases" ? '' : 'collapsed' ?>"
            data-bs-target="#ui-elements" data-bs-toggle="collapse">
            <i class="fa fa-plus"></i>
            <span class="align-middle">Compras</span>
          </a>
          <ul class="sidebar-dropdown list-unstyled collapse <?= $theme_path == "add_purchases" ? 'show' : '' ?>"
            id="ui-elements" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a class="sidebar-link" href="#">Listar compras</a>
            </li>
            <li class="sidebar-item <?= $theme_path == "add_purchases" ? 'active' : '' ?>">
              <a class="sidebar-link" href="<?= APP_URL ?>/controllers/purchases/add.php">Agregar compras</a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#">Listar gastos</a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#">Agregar gastos</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link collapsed" data-bs-target="#tables" data-bs-toggle="collapse">
            <i class="fa fa-cogs"></i>
            <span class="align-middle">Ajustes</span>
          </a>
          <ul class="sidebar-dropdown list-unstyled collapse" id="tables" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a class="sidebar-link" href=#">Ajustes</a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href=#">Respaldos</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link collapsed" data-bs-target="#forms" data-bs-toggle="collapse">
            <i class="fa fa-bar-chart-o"></i>
            <span class="align-middle">Reportes</span>
          </a>
          <ul class="sidebar-dropdown list-unstyled collapse" id="forms" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a class="sidebar-link" href="#">Ventas diarias</a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#">Ventas mensuales</a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#">Reporte de ventas</a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#">Reporte de pagos</a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#">Reporte registrados</a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#">Productos top</a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#">Reporte de productos</a>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>
  <div class="main">

    <!-- NavBar-->
    <nav class="navtop">
      <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
      </a>
      <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="bd-theme" type="button" aria-expanded="false"
              data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
              <span class="theme-icon-active" id="bd-theme-icon">
                <i class="fa fa-sun"></i>
              </span>
              <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
              <li>
                <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="light"
                  aria-pressed="false">
                  <i class="fa fa-sun opacity-50 me-2"></i>Light<i class="pr-check fa fa-check ms-auto d-none"></i>
                </button>
              </li>
              <li>
                <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="dark"
                  aria-pressed="false">
                  <i class="fa fa-moon opacity-50 me-2"></i>Dark<i class="pr-check fa fa-check ms-auto d-none"></i>
                </button>
              </li>
              <li>
                <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="auto"
                  aria-pressed="true">
                  <i class="fa fa-circle-half-stroke opacity-50 me-2"></i>Auto<i
                    class="pr-check fa fa-check ms-auto d-none"></i>
                </button>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle" id="alertsDropdown" href="#" data-bs-toggle="dropdown">
              <div class="position-relative">
                <i class="align-middle" data-feather="bell"></i>
                <span class="indicator">4</span>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
              <div class="dropdown-menu-header">4 New Notifications</div>
              <div class="list-group">
                <a class="list-group-item" href="#">
                  <div class="row g-0 align-items-center">
                    <div class="col-2">
                      <i class="text-danger" data-feather="alert-circle"></i>
                    </div>
                    <div class="col-10">
                      <div>Update completed</div>
                      <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
                      <div class="text-muted small mt-1">30m ago</div>
                    </div>
                  </div>
                </a>
                <a class="list-group-item" href="#">
                  <div class="row g-0 align-items-center">
                    <div class="col-2">
                      <i class="text-warning" data-feather="bell"></i>
                    </div>
                    <div class="col-10">
                      <div>Lorem ipsum</div>
                      <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
                      <div class="text-muted small mt-1">2h ago</div>
                    </div>
                  </div>
                </a>
                <a class="list-group-item" href="#">
                  <div class="row g-0 align-items-center">
                    <div class="col-2">
                      <i class="text-primary" data-feather="home"></i>
                    </div>
                    <div class="col-10">
                      <div>Login from 192.186.1.8</div>
                      <div class="text-muted small mt-1">5h ago</div>
                    </div>
                  </div>
                </a>
                <a class="list-group-item" href="#">
                  <div class="row g-0 align-items-center">
                    <div class="col-2">
                      <i class="text-success" data-feather="user-plus"></i>
                    </div>
                    <div class="col-10">
                      <div>New connection</div>
                      <div class="text-muted small mt-1">Christina accepted your request.</div>
                      <div class="text-muted small mt-1">14h ago</div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="dropdown-menu-footer">
                <a class="text-muted" href="#">Show all notifications</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle" id="messagesDropdown" href="#" data-bs-toggle="dropdown">
              <div class="position-relative">
                <i class="align-middle" data-feather="message-square"></i>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
              <div class="dropdown-menu-header">
                <div class="position-relative">4 New Messages</div>
              </div>
              <div class="list-group">
                <a class="list-group-item" href="#">
                  <div class="row g-0 align-items-center">
                    <div class="col-2">
                      <img class="avatar img-fluid rounded-circle" src="https://dummyimage.com/50x50/d63384/fff.jpg"
                        alt="Vanessa Tucker">
                    </div>
                    <div class="col-10 ps-2">
                      <div>Vanessa Tucker</div>
                      <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
                      <div class="text-muted small mt-1">15m ago</div>
                    </div>
                  </div>
                </a>
                <a class="list-group-item" href="#">
                  <div class="row g-0 align-items-center">
                    <div class="col-2">
                      <img class="avatar img-fluid rounded-circle" src="https://dummyimage.com/50x50/d63384/fff.jpg"
                        alt="William Harris">
                    </div>
                    <div class="col-10 ps-2">
                      <div>William Harris</div>
                      <div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
                      <div class="text-muted small mt-1">2h ago</div>
                    </div>
                  </div>
                </a>
                <a class="list-group-item" href="#">
                  <div class="row g-0 align-items-center">
                    <div class="col-2">
                      <img class="avatar img-fluid rounded-circle" src="https://dummyimage.com/50x50/d63384/fff.jpg"
                        alt="Christina Mason">
                    </div>
                    <div class="col-10 ps-2">
                      <div>Christina Mason</div>
                      <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
                      <div class="text-muted small mt-1">4h ago</div>
                    </div>
                  </div>
                </a>
                <a class="list-group-item" href="#">
                  <div class="row g-0 align-items-center">
                    <div class="col-2">
                      <img class="avatar img-fluid rounded-circle" src="https://dummyimage.com/50x50/d63384/fff.jpg"
                        alt="Sharon Lessman">
                    </div>
                    <div class="col-10 ps-2">
                      <div>Sharon Lessman</div>
                      <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.
                      </div>
                      <div class="text-muted small mt-1">5h ago</div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="dropdown-menu-footer">
                <a class="text-muted" href="#">Show all messages</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
              <i class="align-middle" data-feather="user"></i>
            </a>
            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
              <img class="avatar img-fluid rounded me-1" src="https://dummyimage.com/50x50/d63384/fff.jpg"
                alt="Charles Hall">
              <span>Pirulug</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="pages-profile.html">
                <i class="align-middle me-1" data-feather="user"></i> Profile
              </a>
              <a class="dropdown-item" href="#">
                <i class="align-middle me-1" data-feather="pie-chart"></i> Analytics
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="pages-settings.html">
                <i class="align-middle me-1" data-feather="settings"></i> Settings &amp; Privacy
              </a>
              <a class="dropdown-item" href="#">
                <i class="align-middle me-1" data-feather="help-circle"></i> Help Center
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <i class="align-middle me-1" data-feather="log-out"></i>Log out
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Content-->
    <div class="content">
      <div class="mb-3">
        <h2 class="h3 d-inline align-middle">
          <?php
          if (isset($theme_title)) {
            echo $theme_title;
          } else {
            echo "-";
          }
          ?>
        </h2>
      </div>