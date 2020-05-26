@extends('layouts.app', ['activePage' => 'configurar', 'titlePage' => __('Configuraciones')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('fichos.update', $ficho->id) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card ">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">{{ __('Editar Limite de turnos') }}</h4>
                            <p class="card-category">{{ __('Edicion de turnos limitados') }}</p>
                        </div>
                        <div class="card-body ">
                            @if (Session::has('message'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ Session::get('message') }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
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
                                <label class="col-sm-12 col-form-label">{{ __('Asignacion de numero de turnos') }}</label>
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('cedula') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('deturnos') ? ' is-invalid' : '' }}"
                                            name="deturnos" id="input-deturnos" type="number"
                                            placeholder="{{ __('Numero de turnos') }}" value="{{ old('deturnos', $ficho->numerodeturnos) }}"
                                            required="true" aria-required="true" style="font-size: 3rem; height: 70px;" pattern="[1-9]" />
                                        @if ($errors->has('deturnos'))
                                        <span id="deturnos-error" class="error text-danger"
                                            for="input-name">{{ $errors->first('deturnos') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-success">{{ __('Editar limite') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
