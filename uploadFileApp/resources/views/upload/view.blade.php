<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imágenes</title>
</head>
<body>
    <img width="100" src="{{ asset('carpeta/imagen.png') }}" alt="0">   <!-- Se puede usar url o asset -->
    <img width="100" src="{{ url('storage/carpeta/imagen.png') }}" alt="1">
    <img width="100" src="{{ url('storage/carpeta/nombreCambiadoImagen.png') }}" alt="2">
    <img width="100" src="{{ url('storage/carpeta/imagen.png') }}" alt="">
</body>
</html>
<!-- <img src="{{ url('image/137') }}" alt="..."> -->