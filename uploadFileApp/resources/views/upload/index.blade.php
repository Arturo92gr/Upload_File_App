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
                    <th>Name</th>
                    <th>Uploaded At</th>
                    <!-- <th>View by Name</th>
                    <th>View by ID</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>
                            <img src="{{ route('files.img', ['id' => $file->id]) }}" alt="{{ $file->original_name }}" style="width: 50px; height: auto;">
                        </td>
                        <td>{{ $file->id }}</td>
                        <td><a href="{{ route('files.img', str_replace('exercise/', '', ['id' => $file->id])) }}">{{ $file->original_name }}</a></td>
                        <td><a href="{{ route('files.show', str_replace('exercise/', '', $file->stored_name)) }}">{{ str_replace('exercise/', '', $file->stored_name) }}</a></td>
                        <td>{{ $file->uploaded_at }}</td>
                        <!-- <td>
                            <form action="{{ route('files.show', $file->stored_name) }}">
                                <button type="submit" class="btn btn-primary btn-sm">View by Name</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('files.img', ['id' => $file->id]) }}" method="GET" style="display:inline;">
                                <button type="submit" class="btn btn-secondary btn-sm">View by ID</button>
                            </form>
                        </td> -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('files.create') }}" class="btn btn-success mt-3">Upload File</a>
    </div>
@endsection