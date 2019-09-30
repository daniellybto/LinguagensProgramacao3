<?php
    require_once('config.php');
    $bd = new Banco();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <title>Cadastro de Aluno</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                        $pagina = "home"; 

                        if(!empty($_GET['pagina'])){
                            $pagina= $_GET['pagina'];
                        }
                        if(file_exists("$pagina.php")){
                            include("$pagina.php");
                        }else{
                    ?>
                        <i class="glyphicon glyphicon-thumbs-down"></i> Página Não encontrada!!!
                    <?php } ?>
                </div>
            </div>
        </div>
        
    </body>
</html>