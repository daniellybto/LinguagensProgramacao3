<?php

    $titulo = str_replace('#','-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    //aqui eu organizo o texto a ser inserido no arquivo...
    $texto = $titulo . '#' . $categoria . '#' . $descricao. PHP_EOL;

    //abrir um determinado arquivo da extensão que eu quiser!
    //parâmetro 'a' abre somente para escrita; coloca o ponteiro do arquivo no final do arquivo. Se o arquivo não existir, tentar cria-lo
    $arquivo = fopen('arquivo.hd','a');

    //Escrever de fato o texto no arquivo!
    fwrite($arquivo, $texto);

    //fechar o arquivo aberto 
    fclose($arquivo);

    header('Location: abrir_chamado.php');

?>