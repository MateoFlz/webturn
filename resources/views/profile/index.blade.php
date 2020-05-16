@extends('layouts.app', ['activePage' => 'new', 'titlePage' => __('Nuevo Empleado')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('profile.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Nuevo Empleado') }}</h4>
                            <p class="card-category">{{ __('Informacion del empleado') }}</p>
                        </div>
                        <div class="card-body ">
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
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Numero de cédula') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('cedula') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}"
                                            name="cedula" id="input-cedula" type="number"
                                            placeholder="{{ __('Numero de cédula') }}" value="{{ old('cedula') }}"
                                            required="true" aria-required="true" />
                                        @if ($errors->has('cedula'))
                                        <span id="cedula-error" class="error text-danger"
                                            for="input-name">{{ $errors->first('cedula') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nombre completo') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" id="input-name" type="text"
                                            placeholder="{{ __('Nombre completo') }}" value="{{ old('name') }}"
                                            required="true" aria-required="true" />
                                        @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger"
                                            for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label
                                    class="col-sm-2 col-form-label">{{ __('Dirección de correo electronico') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" id="input-email" type="email"
                                            placeholder="{{ __('Dirección de correo electronico') }}"
                                            value="{{ old('email') }}" required />
                                        @if ($errors->has('email'))
                                        <span id="email-error" class="error text-danger"
                                            for="input-email">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Contraseña') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" id="input-password" type="password"
                                            placeholder="{{ __('Contraseña') }}" value="{{ old('password') }}"
                                            required />
                                        @if ($errors->has('password'))
                                        <span id="password-error" class="error text-danger"
                                            for="input-password">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Confirmar contraseña') }}</label>
                                <div class="col-sm-7">
                                    <div
                                        class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                                        <input
                                            class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                            name="password_confirmation" id="input-password_confirmation"
                                            type="password" placeholder="{{ __('Confirmar contraseña') }}"
                                            value="{{ old('password_confirmation') }}" required />
                                        @if ($errors->has('password_confirmation'))
                                        <span id="password_confirmation-error" class="error text-danger"
                                            for="input-password_confirmation">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Rol de usuario') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('id_rol') ? ' has-danger' : '' }}">
                                        <select class="form-control selectpicker" data-style="btn btn-link" name="id_rol"
                                            id="input-id_rol" value="{{ old('id_rol') }}" required>
                                            <option>{{ __('Seleccione tipo de usuario') }}</option>
                                            @foreach ($id_rol as $item)
                                            <option value="{{ $item->id }}">{{$item->descripcion}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('id_rol'))
                                        <span id="id_rol-error" class="error text-danger"
                                            for="input-id_rol">{{ $errors->first('id_rol') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-success">{{ __('Guardar empleado') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
