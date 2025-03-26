<!DOCTYPE html>
<html>

<head>
    <title>Resultado IMC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <h1>Resultado IMC e Sono</h1>

    <p>
        {{ $imc->nome }}, você tem {{ $imc->idade() }} anos,
        sua altura é {{ $imc->altura }}m,
        seu peso é {{ $imc->peso }}kg
        e seu IMC é: {{ $imc->calcularImc() }}.
    </p>

    <p>
        Pelo cálculo você está classificado como "{{ $imc->classificacaoImc() }}"
    </p>

    <p>
        Quanto ao seu sono: Você dorme em média {{ $imc->horas_sono }} horas por dia.
        Para sua idade, o ideal seria dormir {{ $imc->avaliarSono()['ideal'] }}.
        Seu padrão de sono está {{ $imc->avaliarSono()['status'] }}.
    </p>

    <a href="{{ route('imc.index') }}">Voltar</a>
</body>

</html>