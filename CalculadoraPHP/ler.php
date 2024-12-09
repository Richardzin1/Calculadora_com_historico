 <?php

$arquivo_recebido = $_GET['file'];

$arquivo = './teste/'. $arquivo_recebido; 

// 1 - abrir o arquivo em memória (recuso)

$recurso = fopen($arquivo, 'r');


// 2 - leitura do arquivo
$json = fread($recurso, filesize($arquivo));

// 3 - fechar o recurso (evitar o consumo de memória)
fclose($recurso);

$dados = json_decode($json);

echo 'Numero da operação: ' . $dados->status . '<br>';
echo 'Resultado: ' . $dados->calculo . '<br>';
echo 'operacao:' . "  " . $dados->sinal . '<br>';



echo "<a href='listar.php'>Lista</a>";

