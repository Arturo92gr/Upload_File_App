<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ...existing code... -->
    <title>{{ $upload->original_name }}</title>
</head>
<body>
    <img src="{{ route('upload.show', $upload->storage_name) }}" alt="{{ $upload->original_name }}">
</body>
</html>