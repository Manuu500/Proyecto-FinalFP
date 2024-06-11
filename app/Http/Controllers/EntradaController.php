<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\TipoEntrada;
use Illuminate\Database\QueryException;




class EntradaController extends Controller
{

    public function index(){
        $tiposEntradas = TipoEntrada::all(); // Fetch all ticket types
        return view('entradas', compact('tiposEntradas'));
    }

    public function comprar_entradas($id){
        $entrada = TipoEntrada::findOrFail($id);
        return view('comprar_entradas', compact('entrada'));
    }

    public function store(Request $request)
    {

        $fecha_hora_fin = Carbon::now()->format('Y-m-d H:i:s');
        $fecha_compra = Carbon::now()->format('Y-m-d H:i:s');


        $entrada = Entrada::create([
            'num_entrada' => $request->num_entrada,
            'user_id' => auth()->id(),
            'tipo_id' => $request->tipoEntrada,
            'fecha_hora_visita' => null,
            'fecha_hora_fin' => null,
            'fecha_compra' => $fecha_compra,
            'observaciones' => "",
            'precio' => $request->precio,
            'metodo_pago' => $request->metodo_pago
        ]);

        // dd($entrada);

        //Depurar
        // dd($entrada);
        //Log::info('Datos validados:', $validatedData);

        $entrada->save();
        // session([
        //     'compra_realizada' => true,
        //     'entrada' => $entrada->toArray(),
        //     'tipoEntrada' => $entrada->tipo,
        //     'idEntrada' => $entrada->id
        // ]);

        // dd($entrada->id);

        return redirect()->route('index')->with('success', 'Compra realizada con éxito');
    }

    // public function comprarDirecto($id, Request $request)
    // {
    //     // Aquí puedes obtener el ID de la entrada y procesar la compra
    //     $entrada = Entrada::find($id);
    //     // session(['idExpo' => $id]);

    //     dd($entrada);
    //     $fecha_hora_fin = Carbon::now()->format('Y-m-d H:i:s');
    //     $fecha_compra = Carbon::now()->format('Y-m-d H:i:s');

    //     $entrada = Entrada::create([
    //         'num_entrada' => $request->num_entrada,
    //         'user_id' => auth()->id(),
    //         'expo_id' => $id,
    //         'tipo' => "Clasica",
    //         'fecha_hora_visita' => $request->fecha_hora_visita,
    //         'fecha_hora_fin' => $fecha_hora_fin,
    //         'fecha_compra' => $fecha_compra,
    //         'observaciones' => "",
    //         'metodo_pago' => $request->metodo_pago
    //     ]);

    //     // Verifica si la entrada existe
    //     if (!$entrada) {
    //         return redirect()->route('index')->with('error', 'Entrada no encontrada.');
    //     } else {
    //         return redirect()->route('index')->with('success', 'Entrada comprada.');
    //     }
    // }

    // public function mostrarTiposEntradas()
    // {
    //     try{
    //         $entradasBasica = Entrada::where('tipo', 'basica')->get();
    //         $entradasPremium = Entrada::where('tipo', 'premium')->get();


    //         return view('entradas', compact('entradasBasica', 'entradasPremium'));
    //     }catch(QueryException $e){
    //         dd($e);
    //     }
    // }
}
