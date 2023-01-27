<?php
class Conta
{
    private string $cpfTitular;
    private string $nomeTitular;
    private float  $saldo = 0;


    

    public function defineCpf(string $cpf) 
    {
        $this->cpfTitular = $cpf;
    }
    public function defineNome(string $nome)
    {
        $this->nomeTitular = $nome;
    }
    public function saca(float $valorASacar) 
    {
        if($valorASacar > $this->saldo){
            echo "Saldo insuficiente" .PHP_EOL;
            return;
        }
        $this->saldo -= $valorASacar;

    }
    public function deposita(float $valorADepositar)
    {
        if($valorADepositar < 0){
            echo "Valor necessita ser positivo" . PHP_EOL;
            return;
        }
        $this->saldo += $valorADepositar;

    }
    public function transferi(float $valorATransferir, Conta $contaDestino):void
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo Indisponível" . PHP_EOL;
            return;
        }
        $this->saca($valorATransferir);
        $contaDestino->deposita($valorATransferir);
    }
    public function recuperaCpfTitular():string
    {
        return $this->cpfTitular;
    }
    public function recuperaNomeTitular():string
    {
        return $this->nomeTitular;
    }
    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }
}

?>

