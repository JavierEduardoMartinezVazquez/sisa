<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(56, 56, 56)">
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="control/img/foto.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/home" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>
<!--ADMINISTRADOR -->
@can('User')
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>Catalogos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{route('User')}}" class="nav-link" id="">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              @endcan
              @can('Business')
              <li class="nav-item">
                <a href="{{route('Business')}}" class="nav-link" id="">
                  <i class="nav-icon far fas fa-cogs"></i>
                  <p>Empresas</p>
                </a>
              </li>
              @endcan
              @can('Hourhand')
              <li class="nav-item">
                <a href="{{route('Hourhand')}}" class="nav-link" id="">
                <i class="nav-icon nav-icon fas fa-book"></i>
                  <p>Horarios</p>
                </a>
              </li>
            </ul>
            @endcan
          @can('Assistances')
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>Registro
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Assistances')}}" class="nav-link">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>Asistencias</p>
                </a>
              </li>
              @endcan
              @can('Holidays')
              <li class="nav-item">
                <a href="{{route('Holidays')}}" class="nav-link" id="hol">
                  <i class="nav-icon nav-icon fas fa-book"></i>
                  <p>Vacaciones</p>
                </a>
              </li>
              @endcan
              @can('Permi')
              <li class="nav-item">
                <a href="{{route('Permi')}}" class="nav-link" id="perm">
                  <i class="nav-icon fas fa-calendar-check"></i>
                  <p>Permisos</p>
                </a>
              </li>
            </ul>
            @endcan

<!--USUARIO -->
@can('Assistances')     
      <li class="nav-item has-treeview">
              <a class="nav-link active">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>Reportes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Assistances')}}" class="nav-link">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>Asistencias</p>
                </a>
              </li>
              @endcan
              @can('Businessreporte')
              <li class="nav-item">
                <a href="{{route('Businessreporte')}}" class="nav-link" id="">
                  <i class="nav-icon far fas fa-cogs"></i>
                  <p>Empresas</p>
                </a>
              </li>
              @endcan
              @can('Hourhandreporte')
              <li class="nav-item">
                <a href="{{route('Hourhandreporte')}}" class="nav-link" id="">
                <i class="nav-icon nav-icon fas fa-book"></i>
                  <p>Horarios</p>
                </a>
              </li>
              @endcan
              @can('Nominas')
              <li class="nav-item">
                <a href="{{route('Nominas')}}" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Nomina</p>
                </a>
              </li>
              @endcan
              @can('Permissionsreports')
              <li class="nav-item">
                <a href="{{route('Permissionsreports')}}" class="nav-link">
                  <i class="nav-icon fas fa-calendar-check"></i>
                  <p>Permisos</p>
                </a>
              </li>
            </ul>
            @endcan
          <li class="nav-item has-treeview">
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" 
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             <i class="nav-icon fas fa-sign-out-alt"></i>
                            </a>
                          </li>
                          
                        </li>
                      </ul>
                    </nav>
                  </div>
                </aside>