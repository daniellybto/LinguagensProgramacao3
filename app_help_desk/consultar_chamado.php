<?php require_once 'validador_acesso.php'?>
<?php
//Abro meu arquivo.hd com as informações de abertura é armazenado em $arquivo
  $arquivo = fopen('arquivo.hd', 'r');
  //array que vai receber cada linha do meu arquivo.hd
  $chamados = array();

  //vou percorrer todo meu array com as informações do meu arquivo para só então colocar algo na tela!
  //enquanto houver registros(linhas) a serem recuperados...
  while(!feof($arquivo)){//funçao 'feof' teste pelo fim do arquvo (percorre até a ultima linha!)
    //linhas
    $registro = fgets($arquivo);
    $chamados[] = $registro;
  }

  //fechar o arquivo aberto
  fclose($arquivo);

?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <?php foreach($chamados as $valor) {?>
                <!-- <?php echo "$valor <br>"; ?> -->

                <?php 
                  // com a explosão dos dados da linha $valor meus dados ($chamado_dados) é convertido em um array com as 3 posições delimitadas pelo '#'
                  $chamado_dados = explode('#', $valor);

                  //teste para verificar se é a utima linha (que aliás esta vazia e não tem dados para a impressão em html o que irá gerar erro...)
                  if (count($chamado_dados) < 3){
                    continue;
                  }

                ?>

                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $chamado_dados[0]; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $chamado_dados[1]; ?></h6>
                    <p class="card-text"><?php echo $chamado_dados[2]; ?></p>

                  </div>
                </div>

              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>