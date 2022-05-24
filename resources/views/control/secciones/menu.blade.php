<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="control/img/foto.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Usuario</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview"><!--<li class="nav-item has-treeview menu-open">-->
            <a href="#" class="nav-link active"><!--<a href="#" class="nav-link active">-->
              <i class="nav-icon fas fa-edit"></i>
              <p>Registro
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Holidays')}}" class="nav-link" id="hol">
                  <i class="nav-icon nav-icon fas fa-book"></i>
                  <p>Vacaciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Permissions')}}" class="nav-link">
                  <i class="nav-icon fas fa-calendar-check"></i>
                  <p>Permisos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Catalogos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Business')}}" class="nav-link" id="bus">
                  <i class="nav-icon far fas fa-cogs"></i>
                  <p>Empresas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('User')}}" class="nav-link" id="use">
                  <i class="nav-icon fas fa-user-secret"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Employees')}}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Empleados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Hourhand')}}" class="nav-link" id="hor">
                <i class="nav-icon far fa-calendar-alt"></i>
                  <p>Horarios</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Vacationdays')}}" class="nav-link">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                  <p>Dias de Vacaciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Vacaciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-calendar-check"></i>
                  <p>Permisos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Cerrar sesión</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>