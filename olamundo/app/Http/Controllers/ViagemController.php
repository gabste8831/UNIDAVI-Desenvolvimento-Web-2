<?php

namespace App\Http\Controllers;

use App\Models\Viagem;
use Illuminate\Http\Request;

class ViagemController extends Controller
{
    public function index()
    {
        return view('viagem.index');
    }

    public function calcular(Request $request)
    {
        $request->validate([
            'combustivel' => 'required|string',
            'valor' => 'required|numeric|min:0',
            'distancia' => 'required|numeric|min:0',
            'consumo' => 'required|numeric|min:0'
        ]);

        $viagem = new Viagem($request->all());

        return view('viagem.resultado', compact('viagem'));
    }
}
