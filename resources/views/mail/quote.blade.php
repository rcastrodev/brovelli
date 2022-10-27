<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h2>Solicitud de cotización desde el sitio web</h2>
    <div>
        <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Teléfono:</strong> {{ $data['phone'] }}</p>
        @isset($data['company'])
            <p><strong>Empresa:</strong> {{ $data['company'] }}</p>
        @endisset
        @isset($data['message'])
            <p><strong>Mensaje:</strong> {{ $data['message'] }}</p>
        @endisset
        <div style="margin-top: 20px;">
            <table style="border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Producto</th>
                        <th>Diámetro</th>
                        <th>Material</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['variableproduct'] as $vp)
                        <tr>
                            <td>{{ $vp['code'] }}</td>
                            <td>{{ $vp['name'] }}</td>
                            <td>{{ $vp['diameter'] }}</td>
                            <td>{{ $vp['material'] }}</td>
                            <td>{{ $vp['amount'] }}</td>
                        </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>