<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;


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
        $obra = Obra::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'artista' => $request->artista,
            'foto' => $request->foto
        ]);

        //Depurar
        // dd($entrada);
        //Log::info('Datos validados:', $validatedData);

        $obra->save();
        return redirect()->route('listar_obras')->with('success', 'Compra realizada con éxito');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
