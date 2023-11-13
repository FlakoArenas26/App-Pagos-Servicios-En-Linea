<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recibo de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        h1 {
            padding: 10px;
            text-align: center;
        }

        th {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        td {
            padding: 10px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }

        td.text-end {
            text-align: end;
        }
    </style>
</head>

<body>
    <h1 class="text-center">Recibo de Pago</h1>
    <table>
        <tbody>
            <tr>
                <th scope="row">ID del Pago:</th>
                <td>{{ $payment->id }}</td>
            </tr>
            <tr>
                <th scope="row">Usuario:</th>
                <td>{{ $payment->user->name }}</td>
            </tr>
            <tr>
                <th scope="row">Servicio:</th>
                <td>{{ $payment->service->name }}</td>
            </tr>
            <tr>
                <th scope="row">Monto:</th>
                <td>{{ 'COP ' . number_format($payment->amount, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th scope="row">Fecha:</th>
                <td>{{ $payment->date }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
