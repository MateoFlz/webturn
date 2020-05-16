@extends('layouts.app', ['activePage' => 'edit', 'titlePage' => __('Editar usuario')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('user.update', $users->id) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')

                    <div class="card ">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">{{ __('Editar Perfil') }}</h4>
                            <p class="card-category">{{ __('Información del usuario') }}</p>
                        </div>
                        <div class="card-body ">
                            @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-info">
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
                                            placeholder="{{ __('Numero de cédula') }}" value="{{ old('name', $users->cedula) }}"
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
                                            placeholder="{{ __('Nombre completo') }}"
                                            value="{{ old('name', $users->name) }}" required="true"
                                            aria-required="true" />
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
                                            name="email" id="input-email" type="email" placeholder="{{ __('Email') }}"
                                            value="{{ old('email', $users->email) }}" required />
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
                                            id="input-id_rol" value="{{ old('id_rol') }}" required>
                                            @foreach ($id_rol as $item)
                                            <option value="{{ $item->id }}" {{$users->id_rol == $item->id ? 'selected':''}}>{{$item->descripcion}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('id_rol'))
                                        <span id="id_rol" class="error text-danger"
                                            for="input-id_rol">{{ $errors->first('id_rol') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Estado empleado') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                                        <select class="form-control" data-style="btn btn-link" name="state"
                                            id="input-state" value="{{ old('state') }}" required>
                                            <option value="1" {{$users->state == '1' ? 'selected':''}}>Activo</option>
                                            <option value="0" {{$users->state == '0' ? 'selected':''}}>Inactivo</option>
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
                            <button type="submit" class="btn btn-success">{{ __('Editar informacion') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
                    @csrf
                    @method('put')

                    <div class="card ">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">{{ __('Cambiar la contraseña') }}</h4>
                            <p class="card-category">{{ __('Contraseña') }}</p>
                        </div>
                        <div class="card-body ">
                            @if (session('status_password'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ session('status_password') }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <label class="col-sm-2 col-form-label"
                                    for="input-current-password">{{ __('Contraseña actual') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <input
                                            class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                            input type="password" name="old_password" id="input-current-password"
                                            placeholder="{{ __('Contraseña actual') }}" value="" required />
                                        @if ($errors->has('old_password'))
                                        <span id="name-error" class="error text-danger"
                                            for="input-name">{{ $errors->first('old_password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label"
                                    for="input-password">{{ __('Nueva contraseña') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" id="input-password" type="password"
                                            placeholder="{{ __('Nueva contraseña') }}" value="" required />
                                        @if ($errors->has('password'))
                                        <span id="password-error" class="error text-danger"
                                            for="input-password">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label"
                                    for="input-password-confirmation">{{ __('Confirmar nueva contraseña') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input class="form-control" name="password_confirmation"
                                            id="input-password-confirmation" type="password"
                                            placeholder="{{ __('Confirmar nueva contraseña') }}" value="" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-success">{{ __('Cambiar la contraseña') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
