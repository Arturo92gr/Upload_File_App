@extends('base')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Image View</h2>
        </div>
        <div class="card-body text-center">
            <img src="{{ route('upload.image', ['id' => $file->id]) }}" 
                 alt="{{ $file->original_name }}" 
                 class="img-fluid">
            <div class="mt-3">
                <h4>{{ $file->original_name }}</h4>
                <p>Uploaded: {{ $file->created_at }}</p>
                <a href="{{ route('upload.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection