<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivos pdf e imágenes</title>
</head>
<body>
    <form action="{{ url('upload') }}" method="post" enctype="multipart/form-data">
        @csrf <!-- seguridad OBLIGATORIA: @csrf, consultas preparadas en SQL, nunca guardar un archivo con el nombre original -->
        <input type="file" name="file">
        <input type="submit">
    </form>
</body>
</html>
