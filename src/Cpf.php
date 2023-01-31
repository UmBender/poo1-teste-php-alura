<?php
class Cpf
{
    private string $valor;

    public function __construct(string $cpf) {
        $this->valor = $cpf;
    }

    public function recuperaCpf():string
    {
        return $this->valor;
    }

}
?>


