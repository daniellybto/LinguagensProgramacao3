<?php
    class Poupanca{
        private $nomeTitular;
        private $agencia;
        private $numeroConta;
        private $saldo;

        function __construct($vNomeTitular, $vAgencia, $vNumeroConta, $vSaldo){
            $this->nomeTitular = $vNomeTitular;
            $this->agencia = $vAgencia;
            $this->numeroConta = $vNumeroConta;
            $this->saldo = $vSaldo;
        }

        //setando valores nos atributos!
        function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        //retornando/obtendo com os valores dos atributos:
        function __get($atributo){
            return $this->$atributo;
        }

        function sacar($valor){
            $this->saldo -= $valor;
        }

        function depositar($valor){
            $this->saldo += $valor;
        }

        function transferir($valor, $opcao){
            if($opcao == "Depositante"){
                $this->sacar($valor);
            }
            elseif($opcao == "Beneficiario"){ //Caso seja o Beneficiário!
                $this->depositar($valor);
            }
        }
      
    }
?>