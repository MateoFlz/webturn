@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Gestion de dependencias')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-warning">
            <h4 class="card-title mt-0"> Lista de dependencia</h4>
            <p class="card-category"> Aqui puede ver la informacion correpondiente de las dependencia</p>
          </div>
          <div class="card-body">
            <div class="col-12 text-right">
                <a href="#agregardependencia" class="btn btn-sm">Agregar empleado</a>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="">
                  <th>
                    N°
                  </th>
                  <th>
                    Dependencia
                  </th>
                  <th>
                    Descripcion
                  </th>
                  <th>
                    Acciones
                  </th>
                </thead>
                <tbody>
                 @foreach ($dependencia as $item)
                <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$item->name}}
                    </td>
                    <td>
                        {{$item->descripcion}}
                    </td>
                    <td class="td-actions text-right">
                        <a rel="tooltip" class="btn btn-default btn-link" href="{{ route('user.show', $item->id) }}"
                            data-original-title="" title="">
                            <i class="material-icons">remove_red_eye</i>
                            <div class="ripple-container"></div>
                        </a>
                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $item->id) }}"
                            data-original-title="" title="">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                        </a>
                        <a rel="tooltip" class="btn btn-danger btn-link" href="#"
                            data-original-title="" title="">
                            <i class="material-icons">close</i>
                            <div class="ripple-container"></div>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a name="agregardependencia" style="display: none;">agregar</a>
            <form method="post" action="{{ route('dependencia.store') }}" autocomplete="off" class="form-horizontal">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">{{ __('Nueva Dependencia') }}</h4>
                        <p class="card-category">{{ __('Informacion del la dependencia') }}</p>
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
                            <label class="col-sm-7 col-form-label">{{ __('Nombre completo de la dependencia') }}</label>
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" id="input-name" type="text"
                                        placeholder="{{ __('Nombre dependencia') }}" style="font-size:1.3rem;" value="{{ old('name') }}"
                                        required="true" aria-required="true" />
                                    @if ($errors->has('name'))
                                    <span id="name-error" class="error text-danger"
                                        for="input-name">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-7 col-form-label">{{ __('Descripcion breve de la dependencia') }}</label>
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                                    <textarea class="form-control" name="descripcion" id="" cols="4" rows="3" style="font-size:1.7rem;"></textarea>
                                    @if ($errors->has('descripcion'))
                                    <span id="descripcion-error" class="error text-danger"
                                        for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-success">{{ __('Guardar dependencia') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
