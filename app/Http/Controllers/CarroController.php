<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    protected $carro;

    public function __construct(Carro $carro)
    {
        $this->carro = $carro;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->carro->with('cliente')->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carro = $this->carro;

        $carro->marca = $request->marca;
        $carro->modelo = $request->modelo;
        $carro->save();

        return $carro;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $carro = $this->carro->with('cliente')->find($id);
        if($carro){
            return response()->json($carro, 200);
        }
        return response()->json(['erro' => 'Carro não encontrado']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carro $carro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carro $carro)
    {
        //
    }
}
