<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage; // para utilizar Storage

class SubirControlador extends Controller
{
    function img(Request $request, $file) {
        if(file_exists(storage_path('app/private/carpeta/') . $file)) {
            return response()->file(storage_path('app/private/carpeta/') . $file);
        }
        abort(404);
    }

    function index() {
        return view ('upload.index');
    }

    // con storeAs para guardar en directorio privado
    function subir(Request $request) {
        if($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $nombreOriginal = $file->getClientOriginalName();
            $path = $file->storeAs('carpeta', 'nueva_' . $nombreOriginal);  // guardar en private/carpeta con el nombre original
            // $path = Storage::putFilesAs('carpeta', $file, $nombreOriginal);  // con método Storage, funciona como la línea superior
            echo $path;
        }
    }

    // con move
    function subir1(Request $request) {
        //dd($request->file('file'));  // mostrar los datos de consulta
        if($request->hasFile('file') && $request->file('file')->isValid()) {    //se llama file porque es el name del formulario
            $file = $request->file('file');
            // Guardarlo en la carpeta principal con el nombre z
            $file->move('.', 'z');
            // Guardarlo en la carpeta "carpeta" dentro del directorio actual
            $file->move('carpeta', 'z');
            // Guardarlo en la carpeta "carpeta" dentro de storage
            $file->move('storage/carpeta', 'z');
            //Guardar archivo con nombre original
            $nombreOriginal = $file->getClientOriginalName();   // obtener nombre original
            $file->move('.', $nombreOriginal);
            $path = $file->move('storage/carpeta', $nombroOriginal);
            echo $path;
        }
    }

    // con store
    function subir2(Request $request) {
        if($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $path = $file->store('carpeta', 'public');  // guardar en el directorio storage/public mediante store, renombrando automáticamente y manteniendo la extensión de archivo
            //$path = Storage::putFile('carpeta', $file);    // funciona igual que la línea de arriba, solo puede haber uno
            echo $path;
        }
    }

    function view() {
        return view('upload.view');
    }

}
