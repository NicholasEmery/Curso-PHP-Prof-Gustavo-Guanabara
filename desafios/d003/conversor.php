<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <h1>Conversor de Moedas v1.0</h1>
        <?php
        // Verifica se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtém os dados do formulário
            $valor_reais = $_POST['valor_reais'];
            $moeda_destino = $_POST['moeda_destino'];

            // Realiza a conversão
            $cotacao_dolar = 5.63; // valor da cotação do dólar em relação ao real
            $valor_convertido = $valor_reais / $cotacao_dolar;
            $valor_convertido = number_format($valor_convertido, 2, '.', ''); // formata o valor para ter 2 casas decimais

            // Exibe o resultado da conversão
            echo '<p>' . "<strong>$valor_reais</strong>" . ' <strong>reais</strong> equivalem a ' . "<strong>$valor_convertido</strong>" . ' ' . "<strong>$moeda_destino</strong>" . '.</p>';

            // Cria um botão "Voltar" para retornar à página anterior
            echo '<button onclick="history.back()">Voltar</button>';
        }
        ?>
    </main>
</body>

</html>