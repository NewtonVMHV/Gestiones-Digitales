<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="text-end">Fecha: {{ $tSolicitud->FechaSol }}</div>
    <div class="text-end">ASUNTO: Solicitud de apoyo</div>
    <div class="col text-start">
        <p><strong>LIC. ALEJANDRA HIDALGO ZAVALA</strong></p>
        <p><strong>DIPUTADA DEL DISTRITO XV DE CHAMPOTON</strong></p>
        <P><strong>C.15B X 14 Y 16 COL. MANGUITOS</strong></P>
        <p><strong>PRESENTE</strong></p>
    </div>
    <div class="text-start">
        <p>Por este medio me dirijo a usted de la manera mas atenta y cordial para solicitarte de su 
            apoyo con: {{ $tSolicitud->Solicitud }}. Cabe mencionar que me encuentro en estado de vulnerabilidad.
        </p>
        <p>Sin más por el momento me despido de usted, agradeciendole de antemano la atención prestada a mi solicitud
            y esperando una respuesta favorable de la misma.
        </p>
    </div>
    <div class="text-center">
        <P>Atentamente</P>
        <p>{{ $tSolicitud->Nombres }} {{ $tSolicitud->Apellidos }}</p>
    </div>
    <table class="table table-sm">
        <tbody>
            <tr><td><strong>Datos de la persona que require el apoyo</strong></td></tr>
            <tr><td><strong>Curp</strong></td><td>{{ $tSolicitud->Curp }}</td></tr>
            <tr><td><strong>Nombre Completo</strong></td><td>{{ $tSolicitud->Nombres }} {{ $tSolicitud->Apellidos }}</td></tr>
            <tr><td><strong>Domicilio</strong></td><td>{{ $tSolicitud->address }}</td></tr>
        </tbody>
    </table>
</body>
</html>