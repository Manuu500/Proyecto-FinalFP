<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;



class EntradaController extends Controller
{
    public function store(Request $request)
    {

        $fecha_hora_fin = Carbon::now()->format('Y-m-d H:i:s');
        $fecha_compra = Carbon::now()->format('Y-m-d H:i:s');


        $entrada = Entrada::create([
            'num_entrada' => 2,
            'user_id' => auth()->id(),
            'expo_id' => 1,
            'tipo' => "Clasica",
            'fecha_hora_visita' => $request->fecha_hora_visita,
            'fecha_hora_fin' => $fecha_hora_fin,
            'fecha_compra' => $fecha_compra,
            'observaciones' => "",
            'metodo_pago' => $request->metodo_pago

        ]);

        //Depurar
        // dd($entrada);
        //Log::info('Datos validados:', $validatedData);

        $entrada->save();
        session([
            'compra_realizada' => true,
            'entrada' => $entrada->toArray(),
            'tipoEntrada' => $entrada->tipo,
            'idEntrada' => $entrada->id
        ]);

        // dd($entrada->id);

        return redirect()->route('index')->with('success', 'Compra realizada con éxito');
    }

    public function comprarDirecto($id, Request $request)
    {
        // Aquí puedes obtener el ID de la entrada y procesar la compra
        $entrada = Entrada::find($id);
        // session(['idExpo' => $id]);

        dd($entrada);
        $fecha_hora_fin = Carbon::now()->format('Y-m-d H:i:s');
        $fecha_compra = Carbon::now()->format('Y-m-d H:i:s');

        $entrada = Entrada::create([
            'num_entrada' => 1,
            'user_id' => auth()->id(),
            'expo_id' => $id,
            'tipo' => "Clasica",
            'fecha_hora_visita' => $request->fecha_hora_visita,
            'fecha_hora_fin' => $fecha_hora_fin,
            'fecha_compra' => $fecha_compra,
            'observaciones' => "",
            'metodo_pago' => $request->metodo_pago
        ]);

        // Verifica si la entrada existe
        if (!$entrada) {
            return redirect()->route('index')->with('error', 'Entrada no encontrada.');
        } else {
            return redirect()->route('index')->with('success', 'Entrada comprada.');
        }
    }
}
