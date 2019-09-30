<?php
    require 'autoload.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <link rel="stylesheet" href="../atv4/lib/bootstrap/css/bootstrap.css"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <style>
            .linkos:hover{
                color: black !important;
            }
        </style>
      
        <title>Atividade 06 - Gerar Ordens de Serviço</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
             
                <h5 class="text-light"><i class="material-icons text-light align-text-bottom">dashboard</i> Sis_OS - Dany </h5>
                <!-- Menu Burger -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="container">
                    <div class="collapse navbar-collapse justify-content-md-center" id="navbarNavDropdown">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-white linkos" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons align-text-bottom">perm_identity</i> Usuário</a>
                                <div class="dropdown-menu bg-white " aria-labelledby="dropdown07">
                                    <a class="dropdown-item " href="?objeto=usuario&action=add"><i class="material-icons align-text-bottom">add</i> Adicionar</a>
                                    <a class="dropdown-item " href="?objeto=usuario&action=update"><i class="material-icons align-text-bottom">update</i> Atualizar</a>
                                    <a class="dropdown-item " href="?objeto=usuario&action=search"><i class="material-icons align-text-bottom">search</i> Buscar</a>
                                    <a class="dropdown-item " href="?objeto=usuario&action=delete"><i class="material-icons align-text-bottom">delete</i> Remover</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-white linkos" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons align-text-bottom">face</i> Cliente</a>
                                <div class="dropdown-menu bg-white " aria-labelledby="dropdown07">
                                    <a class="dropdown-item " href="#"><i class="material-icons align-text-bottom">add</i> Adicionar</a>
                                    <a class="dropdown-item " href="#"><i class="material-icons align-text-bottom">update</i> Atualizar</a>
                                    <a class="dropdown-item " href="#"><i class="material-icons align-text-bottom">search</i> Buscar</a>
                                    <a class="dropdown-item " href="#"><i class="material-icons align-text-bottom">delete</i> Remover</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-white linkos" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons align-text-bottom">report</i> Ordem de Serviço</a>
                                <div class="dropdown-menu bg-white " aria-labelledby="dropdown07">
                                    <a class="dropdown-item " href="#"><i class="material-icons align-text-bottom">add</i> Adicionar</a>
                                    <a class="dropdown-item " href="#"><i class="material-icons align-text-bottom">update</i> Atualizar</a>
                                    <a class="dropdown-item " href="#"><i class="material-icons align-text-bottom">search</i> Buscar</a>
                                    <a class="dropdown-item " href="#"><i class="material-icons align-text-bottom">delete</i> Remover</a>
                                </div>
                            </li>
                            
                        </ul>

                        <ul class="navbar-nav text-center">
                            <li class="nav-item pt-2 mr-2 text-black-50"><span>@aqui </span></li>
                            <li class="nav-item"><a class="nav-link" href="logoff.php"> Logout </a></li>
                        </ul>
                    </div>

                </div>

            </nav>

        </header>

        <!-- aqui será o corpo da página, onde será apresentado os conteúdos solicitados pelo HEADER -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php

                        // unset($_SESSION['resultOperacao']);

                        // Caso essa variável de seção já tenha sido criada!
                        if(isset($_SESSION['resultOperacao'])){
                            // $_SESSION['resultOperacao'][0] ==> o resultado da operação  |true = deu tudo certo | false = algo deu errado
                            // $_SESSION['resultOperacao'][1] ==> o Objeto Requisitante (Ex: Usuário, Cliente ou OS)
                            // $_SESSION['resultOperacao'][2] ==> teremos a ação a ser realizada (Ex: add, update, search ou delete)
                            
                            if($_SESSION['resultOperacao'][0]){#caso o retorno seja true!!!
                                echo "<br><br><h3 class='text-success text-center'>" . $_SESSION['resultOperacao'][1] . " foi " . $_SESSION['resultOperacao'][2] . " com Sucesso!</h3>";
                                unset($_SESSION['resultOperacao']);
                            } else{
                                echo "<br><br><h3 class='text-danger text-center'>" . $_SESSION['resultOperacao'][1] . " NÃO foi " . $_SESSION['resultOperacao'][2] . " com Sucesso :-(</h3>";
                            }

                        }
                        
                        else if(!empty($_GET['objeto'])){#se o Get 'objeto' não estiver vazio, significa que o usuário clicou em algum link para realizar alguma operação...
                            include("os_body.php");
                           
                        }else{
                            echo "<br><br><h1 class='text-center'>Bem Vindo ao Sistema de Geração de OS<br>Escolha uma opção acima!</h1>";
                        }

                    ?>


                    
                </div>
            </div>
        </div>





        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        
    </body>
</html>