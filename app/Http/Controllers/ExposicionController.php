<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Exposicion;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;
use Carbon\Carbon;


class ExposicionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exposiciones = Exposicion::all();
        return view('listar_exposiciones', compact('exposiciones'));
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
            'aforo' => 'required|integer',
        ]);

        try{
            $expo = Exposicion::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fecha_inicio' => Carbon::now(), // Obtener la fecha y hora actual
                'aforo' => $request->aforo,
            ]);

            $expo->save();
            return redirect()->route('listar_exposiciones')->with('success', 'La exposicion ha sido guardada exitosamente.');
        }catch(QueryException $e){
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $exposition = Exposicion::findOrFail($id);
        // return view('expositions.show', compact('exposition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exposicion = Exposicion::findOrFail($id);
        return view('editar_exposicion', compact('exposicion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'nombre' => 'required|string|',
                'descripcion' => 'required|string',
                'aforo' => 'required|integer',
                'fecha_inicio' => 'required',
            ]);

            $exposicion = Exposicion::findOrFail($id);
            // dd($exposicion);

            $exposicion->update($request->all());
            $exposicion->save();
            return redirect()->route('listar_exposiciones')->with('success', 'Exposición actualizada con éxito');
        }catch(QueryException $e){
            dd($e);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expo = Exposicion::findOrFail($id);
        $expo->delete();

        return redirect()->route('listar_exposiciones')->with('success', 'Exposicion eliminada correctamente');
    }

    // public function crearSesionExposicion($id)
    // {
    //     Session::put('idExpo', $id);

    //     // Redirigir a la vista de comprar entradas
    //     return redirect()->route('comprar_entradas');
    // }
}
