<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    protected $cliente;
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = $this->cliente->with('carro')->get();
        return response()->json($clientes , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cliente = new Cliente();
        $request->validate($this->cliente->rules(), $this->cliente->feedback());
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->carro_id = $request->carro_id;
        $dataFormatada = $request->data_nascimento;
        $cliente->data_nascimento = $dataFormatada;
        $cliente->save();

        return response()->json($cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $cliente = $this->cliente->with('carro')->find($id);
        if($cliente){
            return response()->json($cliente, 200);
        }
        return response()->json(['erro' => 'Cliente nao encontrado'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        return $request->method();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $cliente = $this->cliente->find($id);
        if($cliente){
            $cliente->delete();
            return response()->json($cliente, 200);
        }
        
        return response()->json(['erro' => 'Cliente não encontrado!'], 404);
    }
}
