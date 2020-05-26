@extends('layouts.app', ['activePage' => 'editar', 'titlePage' => __('Editar Cliente')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('clientes.update', $clientes->id) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Nuevo Cliente') }}</h4>
                            <p class="card-category">{{ __('Informacion del cliente') }}</p>
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
                                            placeholder="{{ __('Numero de cédula') }}" value="{{ old('cedula', $clientes->cedula) }}"
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
                                            placeholder="{{ __('Nombre completo') }}" value="{{ old('name', $clientes->name) }}"
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
                                            value="{{ old('email', $clientes->email) }}" required />
                                        @if ($errors->has('email'))
                                        <span id="email-error" class="error text-danger"
                                            for="input-email">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Telefono') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('telefono') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                            name="telefono" id="input-telefono" type="number"
                                            placeholder="{{ __('Telefono') }}" value="{{ old('telefono', $clientes->telefono) }}"
                                            required />
                                        @if ($errors->has('telefono'))
                                        <span id="telefono-error" class="error text-danger"
                                            for="input-telefono">{{ $errors->first('telefono') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Estado cliente') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                                        <select class="form-control selectpicker" data-style="btn btn-link" name="state"
                                            id="input-state" value="{{ old('state') }}" required>
                                            <option value="1" {{$clientes->state == '1' ? 'selected':''}}>Activo</option>
                                            <option value="0" {{$clientes->state == '0' ? 'selected':''}}>Inactivo</option>
                                        </select>
                                        @if ($errors->has('state'))
                                        <span id="state" class="error text-danger"
                                            for="input-state">{{ $errors->first('state') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-success">{{ __('Guardar cliente') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
