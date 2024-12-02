<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage; // para utilizar Storage

class UploadController extends Controller
{
    function image(Request $request, $id) {
        $image = Image::find($id);
        if(file_exists(storage_path('app/private') . '/' . $image->path)) {
        return response()
        ->file(storage_path('app/private') . '/' . $image->path);
        
        }
        abort(404);
    }

    function index() {
        return view ('upload.index');
    }

    function show(Request $request, $id) {
        $file = File::find($id);
        return view('show', ['file' => $file]);
    }

    function upload(Request $request) {
        if($request->hasFile('file') && $request->file('file')->isValid()) {
        //el archivo se guarda en el storage private
        $path = $request->file('file')->store('privado', 'local');
        //se obtiene la ruta al archivo guardado
        $realPath = storage_path('app/private') . '/' . $path;
        //se obtiene el contenido del archivo
        $data = file_get_contents($realPath);
        //se obtiene el contenido del archivo en base 64
        $base64 = base64_encode($data);
        //se obtiene la extensión del archivo
        $type = pathinfo($realPath, PATHINFO_EXTENSION);
        //se construye el objeto que se va a almacenar en la base de datos
        $file = new File();
        $file->path = $path;
        $file->image64 = $base64;
        $file->image = $data;
        $file->type = $type;
        //se guarda el objeto en la base de datos
        $file->save();
        return redirect('...');
        }
    }

    function view() {
        return view('upload.view');
    }

}
