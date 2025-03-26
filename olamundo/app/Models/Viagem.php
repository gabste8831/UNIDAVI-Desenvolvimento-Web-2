<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    protected $fillable = [
        'combustivel',
        'valor',
        'distancia',
        'consumo'
    ];

    public function calcularGasto()
    {
        // Calcula quantos litros serão necessários
        $litros = $this->distancia / $this->consumo;

        // Calcula o valor total
        $valorTotal = $litros * $this->valor;

        return round($valorTotal, 2);
    }
}
