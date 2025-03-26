<!DOCTYPE html>
<html>

<head>
    <title>Cálculo do IMC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <h1>Cálculo do IMC</h1>

    <form method="POST" action="{{ route('imc.calcular') }}">
        @csrf
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" required>
        </div>

        <div>
            <label>Data de Nascimento:</label>
            <input type="date" name="data_nascimento" required>
        </div>

        <div>
            <label>Peso (kg):</label>
            <input type="number" name="peso" step="0.1" required>
        </div>

        <div>
            <label>Altura (m):</label>
            <input type="number" name="altura" step="0.01" required>
        </div>

        <div>
            <label>Média de horas de sono por dia:</label>
            <input type="number" name="horas_sono" step="0.5" min="0" max="24" required>
        </div>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>