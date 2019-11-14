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
                    <a href="{{ route('roles.index')}}" aria-expanded="false">
                        <i class="icon-list menu-icon"></i><span class="nav-text">Rols</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('permissions.index')}}" aria-expanded="false">
                        <i class="icon-badge menu-icon"></i><span class="nav-text">Permissions</span>
                    </a>
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
