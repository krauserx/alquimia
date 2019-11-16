<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                    <a href="{{ url('/') }}" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                    </a>
            </li>
            <li>
                    <a href="{{ route('empresa.index')}}" aria-expanded="false">
                        <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Empresa</span>
                    </a>
            </li>
            <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-users"></i> <span class="nav-text">Contactos</span>
                    </a>
                    <ul aria-expanded="false">
                      <li><a href="{{ route('personas.index')}}">Lista</a></li>
                      <li><a href="{{ route('personas.create')}}">Crear</a></li>
                    </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-list menu-icon"></i> <span class="nav-text">Control</span>
                </a>
                <ul aria-expanded="false">
                  <li><a href="{{ route('roles.index')}}">Roles</a></li>
                  <li><a href="{{ route('permissions.index')}}">Permisos</a></li>
                </ul>
            </li>
            <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-user menu-icon"></i> <span class="nav-text">Users</span>
                    </a>
                    <ul aria-expanded="false">
                      <li><a href="{{ route('users.create')}}">Crear</a></li>
                      <li><a href="{{ route('users.index')}}">Lista</a></li>
                    </ul>
            </li>
        </ul>
    </div>
</div>
