@extends('layouts.app', ['activePage' => 'listclient', 'titlePage' => __('Lista de clientes')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title ">Clientes</h4>
                        <p class="card-category"> Aquí puedes administrar clientes</p>
                    </div>
                    <div class="card-body">
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
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href=" {{ route('clientes.imprimir') }}" class="btn btn-sm">Imprimir cliente</a>
                                <a href=" {{ route('clientes.authcreate') }}" class="btn btn-sm">Agregar cliente</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Cedula
                                        </th>
                                        <th>
                                            Nombre completo
                                        </th>
                                        <th>
                                            Correo
                                        </th>
                                        <th>
                                            Telefono
                                        </th>
                                        <th>
                                            Estado
                                        </th>
                                        <th class="text-right">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($cliente as $item)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        {{$item->cedula}}
                                    </td>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        {{$item->email}}
                                    </td>
                                    <td>
                                        {{$item->telefono}}
                                    </td>
                                    <td>
                                        @if($item->state == '1')
                                        <div class="badge badge-primary text-wrap" style="width: 6rem;">
                                            Activo
                                        </div>
                                        @else
                                        <div class="badge badge-danger text-wrap" style="width: 6rem;">
                                            Incativo
                                        </div>
                                        @endif
                                    </td>
                                    <td class="td-actions text-right">
                                        <a rel="tooltip" class="btn btn-default btn-link" href=" {{ route('clientes.show', $item->id) }}"
                                            data-original-title="" title="">
                                            <i class="material-icons">remove_red_eye</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('clientes.edit', $item->id) }}"
                                            data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        <form action="{{ route('clientes.destroy', $item->id) }}" method="post" style="display: inline">
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
                            {{$cliente->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
