@extends('layouts.app', ['activePage' => 'new_modulo', 'titlePage' => __('Nuevo Modulo')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('modulo.store') }}" autocomplete="off"
                    class="form-horizontal">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">{{ __('Nuevo Modulo') }}</h4>
                            <p class="card-category">{{ __('Informacion del modulo') }}</p>
                        </div>
                        <div class="card-body ">
                            @include('layouts.page_templates.message')
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
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header card-chart card-header-warning">
                                            <div class="ct-chart" id="">
                                                <input type="text" name="caracteres"
                                                       maxlength="3" class="rounded"
                                                       onkeyup="mayus(this)"
                                                       value="{{ old('caracteres') }}"
                                                       placeholder="000"
                                                       style="text-align:center;
                                                       color:#FFF;
                                                       font-size: 5rem;
                                                       border: 0;
                                                       background-color: #FB8D01;
                                                       width:100%;" required>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">Nombre del modulo</h4>
                                            <p class="card-category"><span class="text-success"></span>Nomenclatura del
                                                modulo maximo 3 caracteres</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="#0" class="btn btn-default" data-toggle="modal"
                                                    data-target="#staticBackdrop">Agregar</a>
                                            </div>
                                            <script>
                                                function mayus(e)
                                                {
                                                    e.value = e.value.toUpperCase();
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h4 class="card-title">Usuario para asignacion</h4>
                                                    <p class="card-category"><span class="text-success"></span>Realice
                                                        la busqueda por el nombre de empelado</p>
                                                    <div class="form-group">
                                                        <input id="idnameuser" id="idnameuser" value=" {{ old('idnameuser') }}" class="border rounded"
                                                            type="text"
                                                            style="height: 2rem; width: 100%"
                                                            required>
                                                        <input type="hidden" id="cc" name="iduser">
                                                        <div id="resultuser">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h4 class="card-title">Dependencia del modulo a crear</h4>
                                                    <p class="card-category"><span
                                                            class="text-success"></span>Seleccione un dependencia de la lista</p>
                                                    <div class="form-group{{ $errors->has('dependencia') ? ' has-danger' : '' }}">
                                                        <select class="form-control selectpicker"
                                                            data-style="btn btn-link" name="dependencia"
                                                            id="input-dependencia" value="{{ old('dependencia') }}"
                                                            required>
                                                            <option>{{ __('Seleccione una dependencia') }}</option>
                                                            @foreach ($dependencia as $item)
                                                            <option value="{{ $item->id }}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('dependencia'))
                                                        <span id="error-dendencia" class="error text-danger"
                                                            for="input-dependencia">{{ $errors->first('dependencia') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-success">{{ __('Guardar modulo') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

