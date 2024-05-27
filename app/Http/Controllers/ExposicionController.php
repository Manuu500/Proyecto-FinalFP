<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exposicion;


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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $exposition = Exposicion::findOrFail($id);
        return view('expositions.show', compact('exposition'));
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
        //
    }
}
