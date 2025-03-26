<!DOCTYPE html>
<html>

<head>
    <title>Resultado Cálculo de Consumo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <h2>Resultado Cálculo de Consumo</h2>

    <div style="background-color: #e8f5e9; padding: 20px; margin: 20px 0;">
        <h3>O valor total do gasto será de:</h3>
        <p>{{ $viagem->combustivel }}: R$ {{ $viagem->calcularGasto() }}</p>
    </div>

    <a href="{{ route('viagem.index') }}" class="button">Voltar</a>
</body>

</html>