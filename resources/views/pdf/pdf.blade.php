<!-- ingreso_salida.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF de Ingreso y Salida de Equipos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #999;
        }
        th, td {
            padding: 4px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Detalle de Ingreso y Salida de Equipos</h3>
        <table>
            <tr>
                <th>ID</th>
                <td>{{ $ingresoSalida->id }}</td>
            </tr>
            <tr>
                <th>Motivo de Ingreso</th>
                <td>{{ $ingresoSalida->motivo_ingreso }}</td>
            </tr>
            <tr>
                <th>Fecha de Ingreso</th>
                <td>{{ $ingresoSalida->fecha_in_ingreso }}</td>
            </tr>
            <tr>
                <th>Fecha de Salida</th>
                <td>{{ $ingresoSalida->fecha_fin_salida }}</td>
            </tr>
            <tr>
                <th>Hora</th>
                <td>{{ $ingresoSalida->hora }}</td>
            </tr>
            <tr>
                <th>ID de Usuario</th>
                <td>{{ $ingresoSalida->idUser }}</td>
            </tr>
            @foreach ($elementos as $elemento)
                <tr>
                    <th colspan="2">Detalle del Elemento</th>
                </tr>
                <tr>
                    <th>ID del Elemento</th>
                    <td>{{ $elemento->id }}</td>
                </tr>
                <tr>
                    <th>Marca</th>
                    <td>{{ $elemento->marca }}</td>
                </tr>
                <tr>
                    <th>Modelo</th>
                    <td>{{ $elemento->modelo }}</td>
                </tr>
                <tr>
                    <th>Serial</th>
                    <td>{{ $elemento->serial }}</td>
                </tr>
                <tr>
                    <th>Estado del Elemento</th>
                    <td>{{ $elemento->estado_elemento }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
