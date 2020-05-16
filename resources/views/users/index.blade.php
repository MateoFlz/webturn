@extends('layouts.app', ['activePage' => 'empleados', 'titlePage' => __('Lista de Empleado')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title ">Empleados</h4>
                        <p class="card-category"> Aquí puedes administrar empleados</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href=" {{ route('profile.index') }}" class="btn btn-sm">Agregar empleado</a>
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
                                            Estado
                                        </th>
                                        <th>
                                            Rol
                                        </th>
                                        <th class="text-right">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $item)
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
                                    <td>
                                        @if($item->id_rol == '1')
                                        Administrador
                                        @else
                                        @if ($item->id_rol == '2')
                                        Estandar
                                        @else
                                        Sistema
                                        @endif
                                        @endif
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
    </div>
</div>
@endsection
