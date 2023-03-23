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
        <h1>Trabalhando com Números Aleatórios</h1>
        <?php
            // echo ""
            $min = 0;
            $max = 100;
            $num = mt_rand($min, $max);
            echo "<p>Gerando um Número Aleatório entre $min e $max... <br>O valor gerado foi <strong>$num</strong><p>";
        ?>
        <button onclick="javascript:document.location.reload()">&#x1F504; Gerar Outro</button>
    </main>
</body>
</html>