<?php

$codigo = rand(1000, 9999);

// verificar se o arquivo existe;
if(! file_exists('teste'))
mkdir('teste');

// abrir o arquivo;

$recurso = fopen("teste/nome_arquivo{$codigo}.txt", 'w');

// escrever no arquivo;

fwrite($recurso, 'meu arquivo');
 

// fechar

fclose($recuso);