<?php 

function lerArquivo($caminho_arquivo){

          // 1 - abrir o arquivo em memória (recuso)

          $recurso = fopen($caminho_arquivo, 'r');


          // 2 - leitura do arquivo
          $json = fread($recurso, filesize($caminho_arquivo));

          // 3 - fechar o recurso (evitar o consumo de memória)
          fclose($recurso);

           return json_decode($json);
  
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de arquivos</title>
  <link rel="stylesheet" href="mystile.css  ">
</head>

<body>
  <h1>Lista de Arquivo <?= date('d/m/y') ?></h1>
  <hr>
  <?php



  $pasta = './teste';

  // 1 - abrir o diretório = pasta
  $arquivos = opendir($pasta);


  // 2 - percorrer o array de arquivos 

  // while($arquivo = readdir($arquivos)){
  //     if ($arquivo != '.' && $arquivo != '..'){
  //     echo $arquivo . '<br>';
  //   }
  // }

  // Em formato html



  ?>

  <table>
    <thead>
      <tr>
        <td>Numero da operação</td>
        <td>Resultado</td>
        <td>Sinal</td>
        <td>Link arquivo</td>
      
      </tr>
    </thead>
    <tbody>
      <?php
      $html = '';
      // percorrer o array de arquivo
      while ($arquivo = readdir($arquivos)) {

        if ($arquivo != '.' && $arquivo != '..') {
  $caminho = './teste/' . $arquivo;

  $dados = lerArquivo($caminho);

          $html .= "<tr>
          <td>$dados->status</td>
          <td>$dados->calculo</td>  
          <td>$dados->sinal</td>  
          <td><a href='ler.php?file=$arquivo'>$arquivo</a></td>
           
        </tr>";
        }
      }

      echo $html;

      // 3 - fechar o recurso 
      closedir($arquivos);
      ?>
    </tbody>
  </table>

  <a href="index.html">Calcular</a>
</body>

</html>