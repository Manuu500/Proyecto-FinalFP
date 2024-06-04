<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('gestion_usuarios', compact('users'));
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
        try{
            $request->validate([
                'dni' => 'required',
                'nombre' => ['required', 'string', 'max:255'],
                'apellido1' => ['required', 'string', 'max:255'],
                'apellido2' => ['required', 'string', 'max:255'],
                'telefono' => ['required','string'],
                'fechaNacimiento' => 'required',
                'codPostal' => 'required',
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
                'password' => ['required', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'dni' => $request->dni,
                'nombre' => $request->nombre,
                'apellido1' => $request->apellido1,
                'apellido2' =>$request->apellido2,
                'telefono' => $request->telefono,
                'fechaNacimiento' => $request->fechaNacimiento,
                'codPostal' => $request->codPostal,
                'email' => $request->email,
                'tipo' => $request->tipo,
                'password' => $request->password
            ]);

            $user->save();
            return redirect()->route('gestion_usuarios')->with('success', 'El usuario ha sido guardada exitosamente.');
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
        $user = User::findOrFail($id);
        return view('editar_usuario', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
            'dni' => 'required',
            'nombre' => ['required', 'string', 'max:255'],
            'apellido1' => ['required', 'string', 'max:255'],
            'apellido2' => ['required', 'string', 'max:255'],
            'telefono' => ['required','string'],
            'fechaNacimiento' => 'required',
            'codPostal' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);

            $user = User::findOrFail($id);

            $user->update($request->all());
            $user->save();
            return redirect()->route('gestion_usuarios')->with('success', 'Usuario actualizado con éxito');
        }catch(QueryException $e){
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('gestion_usuarios')->with('success', 'Usuario eliminado correctamente');
    }
}
