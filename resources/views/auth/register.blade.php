@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'titlePage' => __('Sistema Integrado de Turnos')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
        @if (session('status'))
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        </div>
        @endif
      <form class="form" method="POST" action="{{ route('cliente.store') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-success text-center">
            <h4 class="card-title"><strong>{{ __('Registrar') }}</strong></h4>
          </div>
          <div class="card-body ">
            <p class="card-description text-center">{{ __('Registrar Clientes') }}</p>
            <div class="bmd-form-group{{ $errors->has('cedula') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">featured_play_list</i>
                  </span>
                </div>
                <input type="number" name="cedula" class="form-control" placeholder="{{ __('Numero de cedula...') }}" value="{{ old('cedula') }}" required>
              </div>
              @if ($errors->has('cedula'))
                <div id="cedula-error" class="error text-danger pl-3" for="cedula" style="display: block;">
                  <strong>{{ $errors->first('cedula') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="{{ __('Nombre completo...') }}" value="{{ old('name') }}" required>
              </div>
              @if ($errors->has('name'))
                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                  <strong>{{ $errors->first('name') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Dirección de correo electronico...') }}" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('cedula') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">phone</i>
                    </span>
                  </div>
                  <input type="number" name="telefono" class="form-control" placeholder="{{ __('Numero de telefono...') }}" value="{{ old('telefono') }}" required>
                </div>
                @if ($errors->has('telefono'))
                  <div id="cedula-error" class="error text-danger pl-3" for="telefono" style="display: block;">
                    <strong>{{ $errors->first('telefono') }}</strong>
                  </div>
                @endif
              </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-success">{{ __('Registrar') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
