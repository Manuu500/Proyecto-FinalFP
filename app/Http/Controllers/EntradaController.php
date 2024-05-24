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
            'user_id' => 1,
            'expo_id' => 1,
            'tipo' => "Clasica",
            'fecha_hora_visita' => $request->fecha_hora_visita,
            'fecha_hora_fin' => $fecha_hora_fin,
            'fecha_compra' => $fecha_compra,
            'observaciones' => "",
            'metodo_pago' => $request->metodo_pago

        ]);

        //Depurar
        dd($entrada);
        //Log::info('Datos validados:', $validatedData);

        $entrada->save();
        return redirect()->back()->with('success', 'Compra realizada con éxito');
    }
}
