<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try{
            $obra = Obra::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'artista' => $request->artista,
                'fecha_creacion' => Carbon::now(), // Obtener solo la fecha actual
                'foto' => $request->foto
            ]);

            if ($request->hasFile('foto')) {
                $nombreFoto = time() . "-" . $request->file('foto')->getClientOriginalName();
                $obra->foto = $nombreFoto;

                $request->file('foto')->storeAs('public/imagenes', $nombreFoto);
            }


            $obra->save();
            return redirect()->route('listar_obras')->with('success', 'La obra de arte ha sido guardada exitosamente.');
        }catch(QueryException $e){
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obra = Obra::findOrFail($id);
        return view('editar_obras', compact('obra'));
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

            if ($request->hasFile('foto')) {
                if ($obra->foto) {
                    Storage::delete($obra->foto);
                }

                $nombreFoto = time() .'-'. $request->file('foto')->getClientOriginalName();

                $rutaAlmacenada = $request->file('foto')->storeAs('public/imagenes', $nombreFoto);

                $obra->foto = $nombreFoto;
            }

            $obra->update($request->except('foto'));
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