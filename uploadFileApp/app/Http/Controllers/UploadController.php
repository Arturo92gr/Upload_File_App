<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Upload;

class UploadController extends Controller {
    public function index() {
        $files = File::all();
        return view('upload.index', compact('files'));
    }

    public function show($storedName) {
        $file = File::where('stored_name', 'exercise/' . $storedName)->first();
        if ($file) {
            $storedName = str_replace('exercise/', '', $file->stored_name);
            if (file_exists(storage_path('app/private/exercise/' . $storedName))) {
                return response()->file(storage_path('app/private/exercise/' . $storedName));
            }
        }
        abort(404, 'File not found');
    }
    
    public function image(Request $request, $id) {
        $img = File::find($id);
        if ($img) {
            $storedName = str_replace('exercise/', '', $img->stored_name);
            if (file_exists(storage_path('app/private/exercise/' . $storedName))) {
                return response()->file(storage_path('app/private/exercise/' . $storedName));
            }
        }
        abort(404, 'File not found');
    }


    public function create() {
        return view('upload.create');
    }

    public function store(Request $request) {
        $request->validate([
            'file' => 'required|file',
        ]);
    
        $uploadedFile = $request->file('file');
        $originalName = $uploadedFile->getClientOriginalName();
        $storedName = Carbon::now()->format('Y_m_d_H_i_s') . '_' . $originalName;
        $path = $uploadedFile->storeAs('private/exercise', $storedName, 'local');
    
        $file = File::create([
            'original_name' => $originalName,
            'stored_name' => 'exercise/' . $storedName,
            'uploaded_at' => Carbon::now(),
        ]);
    
        return redirect()->route('upload.index')->with('message', 'File uploaded successfully!');
    }

}