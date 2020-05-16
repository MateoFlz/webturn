@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'titlePage' => __('Sistema Integrado de Turnos')])
@section('content')
<div class="container" style="height: auto; margin-top: 30px;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <div class="col-12">
            <h1 class="text-dark text-center" style="font-size: 2.6em;">{{ __('Bienvenidos al Sistema de Turnos de Coporsucre') }}</h1>
          </div>

        <form action=" {{ route('turno.index') }}" method="POST">
            @csrf
            <h5 class="text-center text-dark">Por favor, Digite su cedula</h5>
            <div class="form-group">
                <input id="cedulaclient" class="form-control-lg border rounded bg-light" type="number" name="cedula"
                style="height: 60px;
                       width: 100%;
                       font-size: 40pt;">
            </div>
            <div class="text-center">
                <button id="cedulaclientbtn" type="submit" class="btn btn-success btn-lg">
                    Solicitar turno
                </button>
            </div>
        </form>
      </div>
  </div>
</div>
@endsection
