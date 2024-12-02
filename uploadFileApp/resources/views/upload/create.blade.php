<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ...existing code... -->
    <title>Subir Imágenes</title>
</head>
<body>
    <form action="{{ route('upload.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".png,.jpg,.gif" required>
        <input type="submit" value="Subir">
    </form>
</body>
</html>