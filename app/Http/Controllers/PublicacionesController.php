<?php

namespace App\Http\Controllers;

use App\Models\Publicaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filtro = $request->filtrar;

        $publicaciones = Publicaciones::where('titulo', 'LIKE', "%$filtro%")->get();
        return view('mostrarPublicaciones', compact('publicaciones'));
    }

    public function view(Request $request)
    {
        $publicacion = Publicaciones::find($request->id);
        return view('mostrarPublicacion', compact('publicacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $publicacion = new Publicaciones;
        $publicacion->titulo = $request->titulo;
        $publicacion->contenido = $request->contenido;
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $path = Storage::putFile('public/imagenes', $request->file('imagen'));
            $nuevo_path = str_replace('public/', '', $path);
            $publicacion->imagen_url = $nuevo_path;
        }
        $publicacion->save();
        return redirect()->route('publicaciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publicaciones $publicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publicaciones $publicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publicaciones $publicacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($publicacion_id)
    {
        $publicacion = Publicaciones::find($publicacion_id);
        $publicacion->delete();
        return redirect()->route('publicaciones.index');
    }
}
