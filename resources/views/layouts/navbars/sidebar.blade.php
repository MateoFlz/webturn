<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ url('/home') }}" class="simple-text logo-normal">
      {{ __('Sistema de turno') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Inicio') }}</p>
        </a>
      </li>
     @inject('istandar', 'App\Http\Controllers\HomeController')
     @if($istandar->isestandar() != '2')
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:35px" src="{{ asset('material') }}/img/setting.png"></i>
          <p>{{ __('Gestión usuarios') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ $activePage == 'profile' || $activePage == 'new' || $activePage == 'empleados' ? 'show' : '' }}" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"></span>
                <span class="sidebar-normal">{{ __('Perfil usuario') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'new' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.index') }}">
                <span class="sidebar-mini"></span>
                <span class="sidebar-normal">{{ __('Nuevo usuario') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'empleados' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"></span>
                <span class="sidebar-normal"> {{ __('Lista de usuarios') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample1" aria-expanded="true">
          <i><img style="width:35px" src="{{ asset('material') }}/img/setting.png"></i>
          <p>{{ __('Gestión Cliente') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ $activePage == 'new_client' || $activePage == 'listclient' ? 'show' : ''}}" id="laravelExample1">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'new_client' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('clientes.authcreate') }}">
                <span class="sidebar-mini"></span>
                <span class="sidebar-normal">{{ __('Nuevo cliente') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'listclient' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('clientes.index') }}">
                <span class="sidebar-mini"></span>
                <span class="sidebar-normal">{{ __('Lista de clientes') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'modulos' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample2" aria-expanded="true">
          <i><img style="width:35px" src="{{ asset('material') }}/img/modulo.png"></i>
          <p>{{ __('Gestión Modulos') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ $activePage == 'new_modulo' || $activePage == 'listmodulos' ? 'show' : '' }}" id="laravelExample2">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'new_modulo' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('modulo.create') }}">
                <span class="sidebar-mini"></span>
                <span class="sidebar-normal">{{ __('Crear modulos') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'listmodulos' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('modulo.index') }}">
                <span class="sidebar-mini"></span>
                <span class="sidebar-normal">{{ __('Lista de modulos') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('dependencia.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Dependencias') }}</p>
        </a>
      </li>
      @endif
    </ul>
  </div>
</div>
