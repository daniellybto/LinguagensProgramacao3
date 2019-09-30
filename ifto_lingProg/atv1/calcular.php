<?php
require_once "Calculadora.class.php";

$primeiroNumero= $_POST["primNumero"];
$segundoNumero=$_POST["segNumero"];
$operacao=$_POST["operacao"];

//CRIANDO UM NOVO OBJETO TIPO Calculadora

$calculando = new Calculadora();
$calculando->num1 = $primeiroNumero;
$calculando->num2 = $segundoNumero;
$calculando->operacao = $operacao;
echo $calculando->calcular();


?>