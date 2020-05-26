@extends('layouts.app', ['activePage' => '', 'titlePage' => __('Gestion de turnos')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title ">Modulos</h4>
                        <p class="card-category"> Aquí puedes administrar modulos de las dependencias</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href=" {{ route('modulo.create') }}" class="btn btn-sm">Agregar Modulo</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th >
                                            Nombre del modulo
                                        </th>
                                        <th>
                                            Dependencia
                                        </th>
                                        <th>
                                            Usuario
                                        </th>
                                        <th class="text-right">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($modulo as $item)
                                <tr>
                                    <td class="text-center">
                                        {{$loop->iteration}}
                                    </td>
                                    <td class="text-center ">
                                        <div class="badge badge-primary text-wrap" style="width: 6rem; font-size: 15px;">
                                            {{$item->name}}
                                        </div>

                                    </td>
                                    <td class="text-center">
                                        {{$item->namedependencia}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->username}}
                                    </td>
                                    <td class="td-actions text-right">
                                        <a rel="tooltip" class="btn btn-default btn-link" href="{{ route('user.show', $item->id) }}"
                                            data-original-title="" title="">
                                            <i class="material-icons">remove_red_eye</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('modulo.edit', $item->id) }}"
                                            data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        <form action="{{ route('modulo.destroy', $item->id) }}" method="post" style="display: inline">
                                            @csrf
                                            @method('delete')
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
