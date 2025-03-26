<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 4 Dev Web 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background-color: #333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 10px solid black;
            border-radius: 40px;
        }

        h1,
        h2 {
            color: #efefee;

        }

        .button {
            display: block;
            padding: 10px;
            margin: 10px auto;
            text-decoration: none;
            background: black;
            color: white;
            width: 80%;
            text-align: center;
        }

        .button:hover {
            background-color: red;
        }

        .card {
            background-color: blue;
            width: 30%;
        }

        
        .selection {
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Exercício 4 Desenvolvimento Web</h1>

        <div class="selection">
            <div class="card">
                <h2>Calculadora IMC</h2>
            </div>

            <div class="card">
                <h2>Calculadora Viagem</h2>
            </div>
        </div>

        <a href="{{ route('imc.index') }}" class="button">Calcular IMC</a>
        <a href="{{ route('viagem.index') }}" class="button">Calcular Gasto de Viagem</a>
    </div>
</body>

</html>