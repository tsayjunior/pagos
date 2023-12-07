<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Consultorio San Santiago </h1>
    <p>Escanee el qr para proceder al pago de su servicio</p>
    <img src="{{ $message->embed($img, 'imageQr.png') }}" alt="Imagen QR">

</body>
</html>