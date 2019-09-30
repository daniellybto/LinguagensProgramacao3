<?php
class Calculadora {

    public $num1;
    public $num2;
    public $operacao;

    public function calcular() {
        if($this->operacao == 'somar'){
            return $this->num1 + $this->num2;
        }
        elseif($this->operacao == 'subtrair'){
            return $this->num1 - $this->num2;
        }
        elseif($this->operacao == 'multiplicar'){
            return $this->num1 * $this->num2;
        }
        elseif($this->operacao == 'dividir'){
            return $this->num1 / $this->num2;
        }
    }
}

?>