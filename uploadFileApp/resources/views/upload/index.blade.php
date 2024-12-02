@extends('base')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">All Files</h1>
        <table class="table table-striped" id="filesTable">
            <thead class="thead-dark">
                <tr>
                    <th>Image Preview</th>
                    <th>ID</th>
                    <th>Original Name</th>
                    <th>Storage Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>
                            <img src="{{ route('upload.image', ['id' => $file->id]) }}" 
                                 alt="{{ $file->original_name }}" 
                                 style="width: 50px; height: auto;">
                        </td>
                        <td>
                            <a href="{{ route('upload.show', ['file' => $file->storage_name]) }}">
                                {{ $file->id }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('upload.show', ['file' => $file->storage_name]) }}">
                                {{ $file->original_name }}
                            </a>
                        </td>
                        <td>{{ $file->storage_name }}</td>
                        <td>{{ $file->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $file->updated_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <a href="#" data-href="{{ route('upload.destroy', $file->id) }}" class="borrar">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <form id="formDelete" action="{{ url('') }}" method="POST">
            @csrf
            @method('DELETE')
        </form>
        
        <a href="{{ route('upload.create') }}" class="btn btn-success mt-3">Upload File</a>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/scripts/script.js') }}"></script>
@endsection