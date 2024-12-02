<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index()
    {
        $upload = Upload::orderBy('original_name')->get();

        if ($upload->isEmpty()) {
            return redirect()->route('upload.create');
        }

        return view('upload.view', ['uploads' => $upload]);
    }

    public function create()
    {
        return view('upload.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:png,jpg,gif',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $timestamp = now()->format('Y_m_d_H_i_s');
        $storageName = $timestamp . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;

        $path = $file->storeAs('private/ejercicio', $storageName);

        $upload = new Upload();
        $upload->original_name = $originalName;
        $upload->storage_name = $storageName;
        $upload->save();

        return redirect()->route('upload.index');
    }

    public function show($storage_name)
    {
        $upload = Upload::where('storage_name', $storage_name)->firstOrFail();
        $path = storage_path('app/private/ejercicio/' . $upload->storage_name);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
}
