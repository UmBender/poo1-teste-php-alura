<?php
require "./Conta.php";
class Conta
{
    private $titular;
    private float  $saldo;
    private static int $numeroDeContas = 0;

    public function __construct(Titular $titular)
    {

        $this->titular =$titular;
        $this->saldo = 0;
        Conta::$numeroDeContas++;
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

    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }
    public function recuperaNomeTitular():string
    {
        return $this->titular->recuperaNome();
    }
    public function recuperaCpfTitular():string
    {
        return $this->titular->recuperaCpf();
    }

    public static function recuperaNumeroDeContas():int
    {
        return Conta::$numeroDeContas;
    }
}

?>

