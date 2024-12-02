<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imágenes Guardadas</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre Original</th>
                <th>Thumbnail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uploads as $upload)
                <tr>
                    <td><a href="{{ route('upload.show', $upload->storage_name) }}">{{ $upload->id }}</a></td>
                    <td><a href="{{ route('upload.show', $upload->storage_name) }}">{{ $upload->original_name }}</a></td>
                    <td>
                        <img src="{{ route('upload.show', $upload->storage_name) }}" alt="{{ $upload->original_name }}" width="100">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>