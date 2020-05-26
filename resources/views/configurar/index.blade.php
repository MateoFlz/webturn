@extends('layouts.app', ['activePage' => 'configurar', 'titlePage' => __('Configuraciones')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('fichos.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">{{ __('Limite de turnos') }}</h4>
                            <p class="card-category">{{ __('Creacion de turnos limitados') }}</p>
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
                                            placeholder="{{ __('Numero de turnos') }}" value="{{ old('deturnos') }}"
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
                            <button type="submit" class="btn btn-success">{{ __('Guardar limite') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">{{ __('Tabla de ficho') }}</h4>
                            <p class="card-category">{{ __('Aqui puede consultar los fichos establecidos') }}</p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col text-right">
                                    <a href=" {{ route('fichos.imprimir') }}" class="btn btn-sm">Imprimir todo</a>
                                </div>
                            </div>
                            @if (Session::has('messages'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ Session::get('messages') }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    <thead class="text-center">
                                      <th>
                                        N°
                                      </th>
                                      <th>
                                        Fecha
                                      </th>
                                      <th>
                                        Turnos del dia
                                      </th>
                                      <th>
                                        Limite de turno
                                      </th>
                                      <th>
                                        Horario
                                      </th>
                                      <th>
                                          Acciones
                                      </th>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($turnos as $item)
                                        <tr>
                                          <td>
                                            {{ $loop->iteration }}
                                          </td>
                                          <td >
                                              <div class="badge badge-primary text-wrap" style="width: 6rem; font-size: 15px;">
                                                  {{$item->fecha}}
                                              </div>
                                          </td>
                                          <td>
                                            {{ $item->turnosdeldia }}
                                          </td>
                                          <td>
                                             {{ $item->numerodeturnos }}
                                          </td>
                                          <td>
                                            {{ $item->horario }}
                                          </td>
                                          <td>
                                            <a rel="tooltip" class="Editlimite btn btn-success btn-link" href="{{ route('fichos.edit', $item->id)}}"
                                                  data-original-title="" title="">
                                                  <i class="material-icons">edit</i>
                                                  <div class="ripple-container"></div>
                                              </a>
                                              <form action="{{ route('fichos.destroy', $item->id) }}" method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button rel="tooltip" class="btn btn-danger btn-link" type="submit"
                                                    data-original-title="" title="">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </form>
                                          </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                                  {{$turnos->links()}}
                                </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
