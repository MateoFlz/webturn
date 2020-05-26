@extends('layouts.app', ['activePage' => 'turnoespera', 'titlePage' => __('Gestion de turnos')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 d-flex align-items-start">
                                <img src=" {{ asset('material') }}/img/mensageria.png" alt="">
                                <span>
                                    <h2>&nbsp;Atencion al cliente</h2>
                                </span>
                            </div>
                        </div>
                        <div class="row border-top">
                            <div class="col-md-12">
                                @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    {{Session::get('message')}}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-5">
                                <div class="card  ">
                                    <div class="card-header card-header-warning">
                                        <h1 class="card-title text-center">{{ $modulos[0]->name }}</h1>
                                    </div>
                                    <div class="card-body">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body d-flex justify-content-center">
                                        <button class="btn btn-success" id="btnllamar"><img
                                                src=" {{ asset('material') }}/img/megaphone.png" alt=""
                                                onclick="document.getElementById('formllamar').submit();"><br>Llamar
                                        </button>

                                        @if ($atencion == 0)
                                        <form id="formllamar"
                                            action=" {{ route('turno.llamado', $allturnos[0]->id ?? '') }}"
                                            method="{{ $allturnos[0]->id ?? '' != '' ? 'post':'get' }}">
                                            @csrf
                                            <input type="hidden" name="llamado" value="1">
                                            <input type="hidden" id="idmodulo" name="modulo"
                                                value="{{ $modulos[0]->id }}">
                                        </form>

                                        @else
                                        <form id="formllamar" action=" {{ route('turno.llamado', $first->id?? '') }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="llamado" value="1">
                                            <input type="hidden" id="idmodulo" name="modulo"
                                                value="{{ $modulos[0]->id }}">
                                        </form>
                                        <button class="btn btn-danger" id="btnstop"><img src=" {{ asset('material') }}/img/stop.png"
                                            alt="" onclick="document.getElementById('formllamarstop').submit();"><br>Terminar
                                        </button>
                                        <form id="formllamarstop" action="{{ route('turno.update', $first->id?? '') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="llamado" value="1">
                                            <input type="hidden" id="idmodulo" name="modulo"
                                                value="{{ $modulos[0]->id }}">
                                        </form>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @if ($atencion == 1)
                            <div id="app" class="col-md-7">
                                <div class="row pt-2">
                                    <div class="col-sm-12">
                                        <div class=" alert bg-light border">
                                            <button type="button" id="cerrar" class="close alert-close"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div class="row">
                                                <h4>Atencion al cliente: </h4>
                                                <div class="col-md-12 border rounded pt-4">
                                                    <div class="col-md-12">
                                                        <h3 class="text-dark"><strong>Cliente: </strong>
                                                            {{$first->name ?? ''}}</h3>
                                                        <h5><strong>Cedula: </strong> {{ $first->cedula ?? ''}}
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Correo:</strong>
                                                            {{ $first->email ?? ''}}
                                                        </h5>
                                                        <h5><strong>Telefono: </strong> {{ $first->telefono ?? ''}}</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 border rounded" style="margin-top:5px; ">

                                                    <form action="{{ route('turno.update', $first->id ?? '') }}"
                                                        method="post" id="esperaform">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1"
                                                                class="text-dark">Servicios prestado</label>
                                                            <select multiple name="servicio[]"
                                                                class="form-control selectpicker"
                                                                data-style="btn btn-link" id="exampleFormControlSelect1"
                                                                required>
                                                                @foreach ($servicio as $items)
                                                                <option value="{{$items->id}}">{{$items->descripcion}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 pt-3">
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="case1 form-check-input"
                                                                        type="checkbox" id="inlineCheckbox1"
                                                                        name="llamado" value="1" checked disabled>
                                                                    Cliente Llamado
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox2" name="atencion" value="1">
                                                                    Cliente Atendido
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox3" name="solucionado"
                                                                        value="1"> Servicio solucionado
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-12 d-flex">
                                                                <div class="col-md-4">
                                                                    <small class="chk1 text-danger"></small>
                                                                </div>

                                                            </div>

                                                            <div class="form-group">
                                                                <textarea class="border rounded" name="observacionturno"
                                                                    id="" cols="10" rows="5"
                                                                    placeholder="Escribe las observacion pertinente de la atencion al cliente"
                                                                    style="width: 100%;">
                                                                  </textarea>
                                                            </div>
                                                            <div class="text-center">
                                                                <button id="btnsubmiturno"
                                                                    class="btn btn-success">Guardar</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if ($atencion == 0)
                            <div id="listurn" class="card col" data-spy="scroll"
                                style="width: 100%; max-height: 400px;">
                                @foreach($allturnos as $item)
                                <div class="border d-flex align-items-start rounded" style="margin: 10px;">
                                    <div class="col-md-10 mibackgroun border rounded"
                                        style="margin: 5px; cursor:pointer">
                                        <span class="text-left"><strong>Nombre:</strong> {{ $item->name }}</span><br>
                                        <span class="text-left"><strong>Cedula:</strong>{{$item->cedula }}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                            aria-haspopup="true">
                                            <i class="material-icons">settings</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="#"
                                                onclick="document.getElementById('formllamar{{$item->id}}').submit();">Llamar
                                                cliente</a>
                                            <form id="formllamar{{$item->id}}"
                                                action=" {{ route('turno.llamado', $item->id ?? '') }}"
                                                method="{{ $allturnos[0]->id ?? '' != '' ? 'post':'get' }}">
                                                @csrf
                                                <input type="hidden" name="llamado" value="1">
                                                <input type="hidden" name="modulo" value="{{ $modulos[0]->id }}">
                                            </form>
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#staticBackdrop{{$item->id}}">Tranferir</a>
                                            <a class="dropdown-item"
                                                href="{{ route('clientes.edit', $item->idclient) }}">Editar</a>
                                            <a class="dropdown-item" href="#">Terminar</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop{{$item->id}}" data-backdrop="static"
                                    data-keyboard="false" tabindex="-1" role="dialog"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Tranferir turno</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('turno.tranferido') }}" method="post">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="card-category">
                                                                <span class="text-success"></span>Numero de cedula del
                                                                cliente</p>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div
                                                                class="form-group{{ $errors->has('cedula') ? ' has-danger' : '' }}">
                                                                <input
                                                                    class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}"
                                                                    name="cedula" id="input-cedula" type="number"
                                                                    placeholder="{{ __('Numero de cédula') }}"
                                                                    value="{{ old('cedula', $item->cedula) }}"
                                                                    required="true" aria-required="true" />
                                                                @if ($errors->has('cedula'))
                                                                <span id="cedula-error" class="error text-danger"
                                                                    for="input-name">{{ $errors->first('cedula') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="card-category">
                                                                <span class="text-success"></span>Seleccione un
                                                                dependencia de la lista</p>
                                                            <div
                                                                class="form-group{{ $errors->has('dependencia') ? ' has-danger' : '' }}">
                                                                <select id="depen" class="form-control selectpicker"
                                                                    data-style="btn btn-link" name="dependencia"
                                                                    id="input-dependencia"
                                                                    value="{{ old('dependencia') }}" required>
                                                                    <option value="">Selecciona una opcion</option>
                                                                    @foreach ($dependencia as $items)
                                                                    <option value="{{ $items->id }}">{{$items->name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('dependencia'))
                                                                <span id="error-dendencia" class="error text-danger"
                                                                    for="input-dependencia">{{ $errors->first('dependencia') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-success">Tranferir</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
