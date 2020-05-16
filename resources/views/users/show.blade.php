@extends('layouts.app', ['activePage' => 'show', 'titlePage' => __('Nuevo Empleado')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('profile.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Informacion Empleado') }}</h4>
                            <p class="card-category">{{ __('Datos de registro del empleado') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Numero de cédula') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('cedula') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}"
                                            name="cedula" id="input-cedula" type="number"
                                            placeholder="{{ __('Numero de cédula') }}" value="{{ $users->cedula }}"
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
                                            placeholder="{{ __('Nombre completo') }}" value="{{ $users->name }}"
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
                                            value="{{ $users->email }}" required />
                                        @if ($errors->has('email'))
                                        <span id="email-error" class="error text-danger"
                                            for="input-email">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Rol de usuario') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('id_rol') ? ' has-danger' : '' }}">
                                        <select class="form-control selectpicker" data-style="btn btn-link" name="id_rol"
                                            id="input-id_rol" value="{{ $users->id_rol }}" required>
                                            <option>{{ __('Seleccione tipo de usuario') }}</option>
                                            @foreach ($id_rol as $item)
                                            <option value="{{ $item->id }}" {{$users->id_rol == $item->id ? 'selected': ''}}>
                                                {{$item->descripcion}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('id_rol'))
                                        <span id="id_rol" class="error text-danger"
                                            for="input-id_rol">{{ $errors->first('id_rol') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <a  class="btn btn-success" href="{{ route('user.index') }}">{{ __('Regresar') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
