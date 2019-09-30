<?php
    require 'autoload.php';
    
    //Verifica se a conta já foi criada a primeira vez!
    if(isset($_SESSION['contaPoupanca'])){
        $contaPoupanca = $_SESSION['contaPoupanca'];
        
    }else{
        $contaExemplo = new Poupanca('Danielly Brito', "001", "001", 2000);
        $_SESSION['contaExemplo'] = $contaExemplo;

    }
    $contaExemplo = $_SESSION['contaExemplo'];
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Atividade 02 - Conta Poupança - by: Danielly Brito</title>
        <meta charset="utf-8">

        <link rel="stylesheet" href="style.css">

    </head>

    <body>
        <header>Atividade 02 - Conta Poupança - by: Danielly Brito</header>

        <section class="corpo">

            <!--Classe Real Criada!-->
            <div>
                <h1>Conta Poupança:</h1>
                

            <?php
                //verifica se a conta Poupança já foi criada:
                if(!isset($contaPoupanca)){//se ela ainda não foi criada, então crie!
            ?>
                <p>*ATENÇÃO: ANTES DE REALIZAR QUALQUER OPERAÇÃO É NECESSÁRIO INICIALIZAR SUA CONTA!</p>
                <br>
                <div class="criarPoupanca">
                    <form action="criarContas.php" method="post">
                        <label>Titular: 
                            <input type="text" name="titular" required>
                        </label>
                        <br><br>
                        <label>Agência: 
                            <input type="text" name="agencia" required>
                        </label>
                        <br><br>
                        <label>Numero da Conta: 
                            <input type="text" name="numConta" required>
                        </label>
                        <br><br>
                        <label>Saldo: 
                            <input type="number" name="saldo" required>
                        </label>
                        <br><br>
                        <div class="centralizado">
                            <input type="submit" value="Criar Poupança">
                        </div>

                    </form>
                </div>
            <?php }
            else{ // Caso já tenha sido criado a Conta Poupança?> 

                <p>
                    <strong>Titular: </strong><?php echo $contaPoupanca->__get('nomeTitular') ?><br>
                    <strong>Agência: </strong><?php echo $contaPoupanca->__get('agencia') ?><br>
                    <strong>Número da Conta: </strong><?php echo $contaPoupanca->__get('numeroConta') ?><br><br>
                    <strong>Saldo: </strong>R$ <?php echo number_format($contaPoupanca->__get('saldo')) ?><br>
                </p>
                <br>
                <hr>
                <br>

                <form method="post" action="possiveisAcoes.php" class="acoes">
                    <label>Valor: 
                        <input type="number" name="valor">
                    </label>
                    <br><br>

                    <fieldset>
                        <legend> Ações Disponíveis: </legend>
                          
                            <input type="submit" name="btnAcao" value="Sacar">
                            <input type="submit" name="btnAcao" value="Depositar">
                            <input type="submit" name="btnAcao" value="Transferir">

                    </fieldset>
                </form>
                
            <?php } ?>

            </div>
            
            <!--Classe EXEMPLO PARA TRANSFERÊNCIA!-->
            <div>
                <h1>Conta EXEMPLO:</h1>
                <p>
                    <strong>Titular: </strong><?php echo $contaExemplo->__get('nomeTitular') ?><br>
                    <strong>Agência: </strong><?php echo $contaExemplo->__get('agencia') ?><br>
                    <strong>Número da Conta: </strong><?php echo $contaExemplo->__get('numeroConta') ?><br><br>
                    <strong>Saldo: </strong>R$ <?php echo number_format($contaExemplo->__get('saldo')) ?><br>
                </p>

                <br>
                <hr>
                <br>


            </div>

            <aside class="log">
                <h3>Extrato de Atividades:</h3>
                <p>
                    <?php 
                        if(isset($_COOKIE['userAtividade'])){
                    ?>

                    <?php 
                            $valoresLog = explode('@',$_COOKIE['userAtividade']);
            
                            echo '<pre>';
                            
                            foreach ($valoresLog as $key => $value) {
                                echo "$value<br>";
                            }
                            
                            echo '</pre>'; 
                        }
                    ?>

                    
                </p>
            </aside>
        </section>
    </body>

</html>