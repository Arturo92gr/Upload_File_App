<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Upload;

class UploadController extends Controller {
    
    public function create() 
    {
        return view('upload.create');
    }
    
    public function index() 
    {
        $files = Upload::all();
        
        if ($files->isEmpty()) {
            return redirect()->route('upload.create');
        }
        
        return view('upload.index', compact('files'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'file' => 'required|file|mimes:png,jpg,gif'
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $storageName = Carbon::now()->format('Y_m_d_H_i_s') . '_' . $originalName;

        // Store file
        try {
            $path = Storage::putFileAs('/exercise', $file, $storageName);
            
            if (!$path) {
                throw new \Exception('Error saving file');
            }

            // Create database record
            $upload = Upload::create([
                'original_name' => $originalName,
                'storage_name' => $storageName
            ]);

            return redirect()->route('upload.index')
                ->with('message', 'File uploaded successfully!');

        } catch (\Exception $e) {
            return back()->withErrors(['file' => 'Error saving file: ' . $e->getMessage()]);
        }
    }

    public function show($storedName) 
    {
        $file = Upload::where('storage_name', $storedName)->firstOrFail();
        return view('upload.show', compact('file'));
    }

    public function image(Request $request, $id) 
    {
        $file = Upload::findOrFail($id);
        
        if (!Storage::exists('exercise/' . $file->storage_name)) {
            abort(404, 'File not found on disk');
        }

        return Storage::response('exercise/' . $file->storage_name);
    }

    public function destroy($id)
    {
        $file = Upload::findOrFail($id);
        
        // Delete file from storage
        if (Storage::exists('exercise/' . $file->storage_name)) {
            Storage::delete('exercise/' . $file->storage_name);
        }
        
        // Delete database record
        $file->delete();
        
        return redirect()->route('upload.index')
            ->with('message', 'File deleted successfully!');
    }

}