<?php
class Conta
{
    private string $cpfTitular;
    private string $nomeTitular;
    private float  $saldo;
    private static int $numeroDeContas = 0;

    public function __construct(string  $nomeTitular, string  $cpfTitular)
    {
        $this->cpfTitular = $cpfTitular;
        $this->validaNomeTitular($nomeTitular);
        $this->nomeTitular = $nomeTitular;
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
    private function validaNomeTitular(string $nomeTitular) {
        if(strlen($nomeTitular) < 5){
            echo "Nome precisa ter pelo menos 5 caracteres" . PHP_EOL;
            exit();
        }
    }
    public static function recuperaNumeroDeContas():int
    {
        return Conta::$numeroDeContas;
    }
}

?>

