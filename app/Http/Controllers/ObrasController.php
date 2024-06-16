<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;
use App\Models\Exposicion;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;




class ObrasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obras = Obra::all();
        return view('listar_obras', compact('obras'));
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
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'artista' => 'required|string',
        'fecha_creacion' => 'required|date',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    try {
        $obra = Obra::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'artista' => $request->artista,
            'fecha_creacion' => $request->fecha_creacion,
            'foto' => $request->foto,
        ]);

        if ($request->hasFile('foto')) {
            $nombreFoto = time() . "-" . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAs('public/imagenes', $nombreFoto);
            $obra->foto = $nombreFoto;
            $obra->save();
        }

        if ($request->has('exposiciones')) {
            $obra->exposiciones()->attach($request->exposiciones);
        }

        return redirect()->route('listar_obras')->with('success', 'La obra de arte ha sido guardada exitosamente.');
    } catch (QueryException $e) {
        dd($e);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function buscar(Request $request)
{
        $nombre = $request->input('nombre');
        $obras = Obra::where('nombre', 'like', "%$nombre%")->get();
        return view('listar_obras', compact('obras'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $obra = Obra::findOrFail($id);
    $exposiciones = Exposicion::all(); // Cargar todas las exposiciones disponibles

    return view('editar_obras', compact('obra', 'exposiciones'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    try {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'artista' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $obra = Obra::findOrFail($id);

        // Actualizar campos de la obra
        $obra->nombre = $request->nombre;
        $obra->descripcion = $request->descripcion;
        $obra->artista = $request->artista;
        $obra->fecha_creacion = $request->fecha_creacion;

        // Manejar la foto si se está actualizando
        if ($request->hasFile('foto')) {
            if ($obra->foto) {
                Storage::delete($obra->foto);
            }
            $nombreFoto = time() .'-'. $request->file('foto')->getClientOriginalName();
            $rutaAlmacenada = $request->file('foto')->storeAs('public/imagenes', $nombreFoto);
            $obra->foto = $nombreFoto;
        }

        // Actualizar relaciones con exposiciones
        $obra->exposiciones()->sync($request->exposiciones); // Sincronizar exposiciones asociadas

        $obra->save();
        return redirect()->route('listar_obras')->with('success', 'Obra actualizada con éxito');
    } catch (QueryException $e) {
        dd($e);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obra = Obra::findOrFail($id);
        $obra->delete();

        return redirect()->route('listar_obras')->with('success', 'Obra eliminada correctamente');
    }
}
