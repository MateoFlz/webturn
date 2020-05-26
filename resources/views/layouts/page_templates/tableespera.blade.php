<div class="table-responsive">
    <table class="table table-hover">
        <thead class="">
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
                Fecha y hora
            </th>
            <th>
                Servicios
            </th>
            <th class="text-center">
                Acciones
            </th>
        </thead>
        <tbody>
            @foreach ($turnoservice as $item)
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
                    {{$item->fecha }}:{{$item->inicio}}-{{$item->fin}}:{{$item->horario}}
                </td>
                <td>
                    <div class="border rounded bg-light">
                        {{$item->descripcion}}
                    </div>

                </td>
                <td>
                    <a rel="tooltip" class="btn btn-default btn-link" href="#"
                        data-original-title="" title="">
                        <i class="material-icons">remove_red_eye</i>
                        <div class="ripple-container"></div>
                    </a>
                    <a rel="tooltip" class="btn btn-success btn-link" href="#"
                        data-original-title="" title="">
                        <i class="material-icons">edit</i>
                        <div class="ripple-container"></div>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$turnoservice->links()}}
</div>
