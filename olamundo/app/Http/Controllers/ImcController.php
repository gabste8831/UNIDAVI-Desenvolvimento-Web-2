<?php

namespace App\Http\Controllers;

use App\Models\Imc;
use Illuminate\Http\Request;

class ImcController extends Controller
{
    public function index()
    {
        return view('imc.index');
    }

    public function calcular(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'data_nascimento' => 'required|date',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'horas_sono' => 'required|numeric|min:0|max:24'
        ]);

        $imc = new Imc($request->all());

        return view('imc.resultado', compact('imc'));
    }
}
