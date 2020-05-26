<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes de turnos no atendios</title>
    <style>
        .wp-table tr:nth-child(odd) {
            background-color: #fff;
        }

        .wp-table tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        .wp-table tr {
            border-bottom: 1px solid #ddd;
        }

        .wp-table th:first-child,
        .wp-table td:first-child {
            padding-left: 16px;
        }


        .wp-table td,
        .wp-table th {
            padding: 10px 10px;
            display: table-cell;
            text-align: left;
            vertical-align: top;
        }

        .wp-table th {
            font-weight: bold;
        }

        .wp-table {
            font-size: 14px !important;
            border: 1px solid #ccc;
            border-radius: 5px;
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            display: table;
        }
        .text-center{
            text-align: center;
        }
        .font{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

    </style>
</head>

<body>
    <div class="">
        <img src="../public/material/img/logo.png" alt="logo" width="130" height="130">
        <h1 class="text-center">Turnos no atendido</h1>
        <div class="">
            <p class=""> Reportes de turnos no atendios</p>
            <p class=""> Numero de registros: <strong>{{count($noatendidos)}}</strong></p>
        </div>
        <div class="border redondo">
            <div class="">
                <table class="wp-table">
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
                            Fecha y hora
                        </th>
                    </tr>
                    @foreach ($noatendidos as $item)
                    <tr>
                        <td>
                            {{$loop->iteration}}
                        <td>
                            {{$item->cedula}}
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            <div class="badge badge-danger text-wrap">
                                {{$item->fecha}}-{{$item->inicio}}:{{$item->horario}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>

</html>
