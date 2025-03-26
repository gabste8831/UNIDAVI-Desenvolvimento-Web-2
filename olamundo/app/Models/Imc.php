<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imc extends Model
{
    protected $fillable = [
        'nome',
        'data_nascimento',
        'peso',
        'altura',
        'horas_sono'
    ];

    public function calcularImc()
    {
        return round($this->peso / ($this->altura * $this->altura), 1);
    }

    public function classificacaoImc()
    {
        $imc = $this->calcularImc();

        if ($imc < 18.5) {
            return "Abaixo do peso";
        } elseif ($imc >= 18.5 && $imc < 25) {
            return "Peso Normal";
        } elseif ($imc >= 25 && $imc < 30) {
            return "Sobrepeso";
        } else {
            return "Obesidade";
        }
    }

    public function idade()
    {
        return \Carbon\Carbon::parse($this->data_nascimento)->age;
    }

    public function avaliarSono()
    {
        $idade = $this->idade();
        $horasSono = $this->horas_sono;

        if ($idade >= 0 && $idade <= 0.25) { // 0-3 meses
            $ideal = "14 a 17 horas";
            $status = ($horasSono >= 14 && $horasSono <= 17) ? "adequado" : "inadequado";
        } elseif ($idade <= 0.92) { // 4-11 meses
            $ideal = "12 a 15 horas";
            $status = ($horasSono >= 12 && $horasSono <= 15) ? "adequado" : "inadequado";
        } elseif ($idade <= 2) { // 1-2 anos
            $ideal = "11 a 14 horas";
            $status = ($horasSono >= 11 && $horasSono <= 14) ? "adequado" : "inadequado";
        } elseif ($idade <= 5) { // 3-5 anos
            $ideal = "10 a 13 horas";
            $status = ($horasSono >= 10 && $horasSono <= 13) ? "adequado" : "inadequado";
        } elseif ($idade <= 13) { // 6-13 anos
            $ideal = "9 a 11 horas";
            $status = ($horasSono >= 9 && $horasSono <= 11) ? "adequado" : "inadequado";
        } elseif ($idade <= 17) { // 14-17 anos
            $ideal = "8 a 10 horas";
            $status = ($horasSono >= 8 && $horasSono <= 10) ? "adequado" : "inadequado";
        } elseif ($idade <= 25) { // 18-25 anos
            $ideal = "7 a 9 horas";
            $status = ($horasSono >= 7 && $horasSono <= 9) ? "adequado" : "inadequado";
        } elseif ($idade <= 64) { // 26-64 anos
            $ideal = "7 a 9 horas";
            $status = ($horasSono >= 7 && $horasSono <= 9) ? "adequado" : "inadequado";
        } else { // 65+ anos
            $ideal = "7 a 8 horas";
            $status = ($horasSono >= 7 && $horasSono <= 8) ? "adequado" : "inadequado";
        }

        return [
            'ideal' => $ideal,
            'status' => $status
        ];
    }
}
