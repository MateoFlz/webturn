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
                <a href=" {{ route('dependencia.imprimir') }}" class="btn btn-sm">Imprimir dependencias</a>
                <a href="{{ route('dependencia.create') }}" class="btn btn-sm">Agregar dependencia</a>
            </div>
            @if (session('status'))
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                    </div>
                </div>
            </div>
            @endif
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
                 @foreach($dependencia as $item)
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
                        <a rel="tooltip" class="btn btn-default btn-link" href="{{ route('dependencia.show', $item->id) }}"
                            data-original-title="" title="">
                            <i class="material-icons">remove_red_eye</i>
                            <div class="ripple-container"></div>
                        </a>
                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('dependencia.edit', $item->id) }}"
                            data-original-title="" title="">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                        </a>
                        <form action="{{ route('dependencia.destroy', $item->id) }}" method="post" style="display: inline">
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
              {{$dependencia->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
