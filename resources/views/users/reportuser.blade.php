<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes Empleados</title>
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
        <h1 class="text-center">Empleados registrados</h1>
        <div class="">
            <p class=""> Reportes de usuarios registrados</p>
            <p class=""> Numero de registros: <strong>{{count($users)}}</strong></p>
        </div>
        <div class="border redondo">
            <div class="">
                <table class="wp-table">
                    <tr>
                        <th>ID</th>
                        <th>Cedula</th>
                        <th>Nombre completo</th>
                        <th>Correo</th>
                        <th> Estado</th>
                        <th> Rol</th>
                    </tr>
                    @foreach ($users as $item)
                    <tr>
                        <td data-column="ID">
                            {{$loop->iteration}}
                        </td>
                        <td data-column="Cedula">
                            {{$item->cedula}}
                        </td>
                        <td data-column="Nombre completo">
                            {{$item->name}}
                        </td>
                        <td data-column="Correo">
                            {{$item->email}}
                        </td>
                        <td data-column="Estado">
                            @if($item->state == '1')
                            Activo
                            @else
                            Incativo
                            @endif
                        </td>
                        <td data-column="Rol">
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
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>

</html>
