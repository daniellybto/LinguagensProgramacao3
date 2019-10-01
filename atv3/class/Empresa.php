<?php

require 'Conexao.php';

    class Empresa{
        private $razaoSocial;
        private $nomeFantasia;
        private $cnpj;
        private $endereco;
        private $numero;
        private $bairro;
        private $cidade;
        private $estado;
        private $responsavel;
        private $email;
        private $telefone;
        
        function __construct($vRazaoSocial, $vNomeFantasia, $vCnpj, $vEndereco, $vNumero, $vBairro, $vCidade, $vEstado, $vResponsavel, $vEmail, $vTelefone){
            $this->razaoSocial = $vRazaoSocial;
            $this->nomeFantasia = $vNomeFantasia;
            $this->cnpj = $vCnpj;
            $this->endereco = $vEndereco;
            $this->numero = $vNumero;
            $this->bairro = $vBairro;
            $this->cidade = $vCidade;
            $this->estado = $vEstado;
            $this->responsavel = $vResponsavel;
            $this->email = $vEmail;
            $this->telefone = $vTelefone;
        }

        public function inserir(){
            $conexao = new Conexao();

            $sql = "INSERT INTO empresa(razao_social,nome_fantasia,cnpj, endereco, numero, bairro, cidade, estado, responsavel, email, telefone) VALUES ('$this->razaoSocial', '$this->nomeFantasia', '$this->cnpj', '$this->endereco', '$this->numero', '$this->bairro', '$this->cidade', '$this->estado', '$this->responsavel', '$this->email', '$this->telefone')";

            if($conexao->mysqli->query($sql) === TRUE){
                echo "Cadastro Realizado com Sucesso!<br> Você Será Redirecionado em 10 segundos!";
            } else{
                echo "Cadastro não Realizado.";
            }

            $conexao->mysqli->close();
            
        }
    }

?>