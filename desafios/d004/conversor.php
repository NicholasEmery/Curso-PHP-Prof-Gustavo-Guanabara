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

            $inicio = date("m-d-Y", strtotime("-7 days"));
            $fim = date("m-d-Y");
            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\'' . $inicio . '\'&@dataFinalCotacao=\'' . $fim . '\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

            $dados = json_decode(file_get_contents($url), true);

            $cotação = $dados["value"][0]["cotacaoCompra"];

            $valor_convertido = $valor_reais / $cotação;
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