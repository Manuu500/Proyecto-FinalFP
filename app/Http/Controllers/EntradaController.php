<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Entrada;
use App\Models\Exposicion;
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

    public function seleccionarEntrada($id)
    {
         // Obtener el ID del usuario autenticado
    $idUsuario = auth()->user()->id;

    // Recuperar todas las entradas del usuario con ese ID
    $entradas = Entrada::where('user_id', $idUsuario)
                        ->with('tipoEntrada') // Cargar la relación tipoEntrada
                        ->get();


    return view('seleccionar_entrada', compact('entradas', 'id'));
    }

    public function procesarSeleccion(Request $request, $idExpo)
    {
        $request->validate([
            'entrada_id' => 'required|exists:entrada,id',
        ]);

        $entrada = Entrada::findOrFail($request->entrada_id);

        // dd($entrada);
        // Obtener la exposición asociada a la entrada
        $exposicion = Exposicion::findOrFail($idExpo);

        // dd($exposicion);

        // Actualizar la fecha_hora_visita de la entrada
        $entrada->fecha_hora_visita = $exposicion->fecha_inicio;
        $entrada->save();

        // Redirigir a la lista de exposiciones
        return redirect()->route('listar_exposiciones')->with('success', 'Entrada seleccionada y fecha de visita actualizada correctamente.');
    }

    public function comprar_entradas($id){
        $entrada = TipoEntrada::findOrFail($id);
        return view('comprar_entradas', compact('entrada'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'num_entrada' => 'required|integer|min:1',
            'tipoEntrada' => 'required|integer',
            'precio' => 'required|numeric',
            'metodo_pago' => 'required|string',
        ]);

        $cantidad = $request->num_entrada;
        $user_id = auth()->id();
        $tipo_id = $request->tipoEntrada;
        $precio = $request->precio;
        $metodo_pago = $request->metodo_pago;
        $fecha_compra = Carbon::now()->format('Y-m-d H:i:s');

        for ($i = 0; $i < $cantidad; $i++) {
            $entrada = Entrada::create([
                'num_entrada' => 1,
                'user_id' => $user_id,
                'tipo_id' => $tipo_id,
                'fecha_hora_visita' => null,
                'fecha_hora_fin' => null,
                'fecha_compra' => $fecha_compra,
                'observaciones' => "",
                'precio' => $precio,
                'metodo_pago' => $metodo_pago
            ]);
        }
        return redirect()->route('index')->with('success', 'Compra realizada con éxito');
    }

    public function ver_entradas($id){
        // Obtén las entradas compradas por el usuario con el ID dado
        $entradas = Entrada::where('user_id', $id)->with('tipoEntrada')->orderBy('created_at', 'desc')->get();

        return view('listar_entradas_compradas', compact('entradas'));
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
