@extends('base')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">All Files</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Image Preview</th>
                    <th>ID</th>
                    <th>Original Name</th>
                    <th>Uploaded At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>
                            <img src="{{ route('upload.image', ['id' => $file->id]) }}" alt="{{ $file->original_name }}" style="width: 50px; height: auto;">
                        </td>
                        <td>{{ $file->id }}</td>
                        <td>
                            <a href="{{ route('upload.show', ['file' => $file->storage_name]) }}">{{ $file->original_name }}</a>
                        </td>
                        <td>{{ $file->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('upload.create') }}" class="btn btn-success mt-3">Upload File</a>
    </div>
@endsection