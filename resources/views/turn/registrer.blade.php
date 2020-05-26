@extends('layouts.app', ['class' => 'Turnero', 'activePage' => '', 'titlePage' => __('Error de existencia de usaurio')])
@section('content')
<div id="app" class="container" style="height: auto; margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-12">
                    <h1 class="text-center text-dark">El cliente ingresado no existe</h1>
                  <div class="col text-center">
                    <img src=" {{ asset('material') }}/img/johon.gif">
                    <h4 class="text-dark">Redireccionando</h4>
                    <img src=" {{ asset('material') }}/img/load2.gif" style="max-height: 100px;">
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    setTimeout("location.href='/cliente'", 9000);
</script>
@endsection
