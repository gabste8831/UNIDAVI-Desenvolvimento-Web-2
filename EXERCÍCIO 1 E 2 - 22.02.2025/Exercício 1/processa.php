<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Recebidos PHP</title>
</head>
<body>

    <h2>Dados Recebidos</h2>
    
    <p><strong>Método Usado:</strong> <?= $_SERVER['REQUEST_METHOD']; ?></p>

    <h3>Dados Enviados:</h3>
    <pre><?php print_r($_REQUEST); ?></pre>

    <h3>Cabeçalho da Requisição:</h3>
    <pre><?php print_r(apache_request_headers()); ?></pre>

</body>
</html>
