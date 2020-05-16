@if ($class ?? ''  == 'off-canvas-sidebar')
@else
<div class="wrapper">
  @include('layouts.navbars.sidebar')
  <div class="main-panel">
    @include('layouts.navbars.navs.auth')
    @yield('content')
    @include('layouts.footers.auth')
  </div>
  @endif
</div>
