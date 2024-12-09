<?php
// codigo para numerar as formatacao em json na pasta 'teste'
$codigo = rand(1000, 9999);


// function calcular para calculadora
function calcular($num1, $num2, $operacao){
    if($operacao == 'somar'){
       return $num1 + $num2;
    }
    if($operacao == 'subtrair'){
       return $num1 - $num2;
    }
    if($operacao == 'multiplicar'){
       return $num1 * $num2;
    }if($operacao != 0){
    return $num1 / $num2;
    
} 
}

// obter valores do formulario e armazenando em variaveis, caso o valor não exista sera definida como uma string vazia
$num1 = isset($_POST['num1']) ? $_POST['num1'] : '';
$num2 = isset($_POST['num2']) ? $_POST['num2'] : '';
$operacao = isset($_POST['operacao']) ? $_POST['operacao'] : '';





// acomular erros de validação
$erros = '';

// acomular sinais de operacao

$sinal = '';



// armazenar operacao de sinais
if($operacao == 'somar'){
    $sinal = '+';
}elseif($operacao == 'subtrair'){
    $sinal = '-';
}elseif($operacao == 'multiplicar'){
    $sinal = '*';
}
elseif($operacao == 'dividir'){
    $sinal = '/';
}

// validar isso em if e exibir texto de erro na tela
if(empty($num1)){
        $erros .= 'Num1 esta vazio !!<br>';
     }
     if(empty($num2)){
         $erros .= 'Num2 está vazio !!<br>';
     }
     
     if(!empty($erros)){
         echo "Tem erros no formulario !! <br>$erros";
     }
     else{
         $resultado = calcular($num1, $num2, $operacao);
     if($resultado < 0 ){
     echo "resultado negativo: " . $resultado;
     } else{
         $dados = [

            'sinal' => $sinal,
             'status' => $codigo,
             'calculo' => $resultado
         ];
     
         $json = json_encode($dados);
     
         echo $json;   
}
     }


    

    // ler pasta


// verificar se o arquivo existe;
if(! file_exists('teste'))
mkdir('teste');

// abrir o arquivo;

$recurso = fopen("teste/nome_arquivo{$codigo}.json", 'w');

// escrever no arquivo;

fwrite($recurso, $json);
 

// fechar

fclose($recurso);

header('location: listar.php');




















