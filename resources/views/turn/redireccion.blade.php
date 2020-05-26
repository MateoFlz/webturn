@extends('layouts.app', ['class' => 'Turnero', 'activePage' => '', 'titlePage' => __('Turno solicitado correctamente')])
@section('content')
<div id="app" class="container" style="height: auto; margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-12">
                    <h1 class="text-center text-dark">Turno solicitado correctamente</h1>
                  <div class="col text-center">
                    <img src=" {{ asset('material') }}/img/loads.gif">
                    <h3 class="text-dark">Posicion del turno: <strong>{{ $numerturno ?? '' }}</strong></h3>
                    <h4 class="text-dark">Redireccionando</h4>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    setTimeout("location.href='/'", 8000);
</script>
@endsection
