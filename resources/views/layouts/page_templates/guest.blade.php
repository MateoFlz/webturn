@if($class != 'Turnero')
@include('layouts.navbars.navs.guest')
@endif
<div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter"  filter-color="black" style="" data-color="purple">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    @yield('content')
  </div>
</div>