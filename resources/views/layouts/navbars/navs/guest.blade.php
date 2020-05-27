<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ url('/') }}"><strong>{{ $titlePage }}</strong></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item{{ $activePage == 'register' ? ' active' : '' }}">
          <a href="{{ route('cliente.create') }}" class="nav-link text-dark">
            <i class="material-icons">person_add</i> {{ __('Registrar') }}
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'sistema' ? ' active' : '' }}">
          <a href="{{ route('sistema') }}" class="nav-link text-dark">
            <i class="material-icons">surround_sound</i> {{ __('Sistema') }}
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
          <a href="{{ route('login') }}" class="nav-link text-dark">
            <i class="material-icons">fingerprint</i> {{ __('Ingresar') }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
