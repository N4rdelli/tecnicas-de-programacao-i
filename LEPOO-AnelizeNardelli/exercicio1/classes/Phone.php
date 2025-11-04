<?php
declare(strict_types=1);

class Phone{
    // Declara os atributos privados
    private int $ddd;
    private string $number;

    // Constructor da classe para inicializar os atributos
    public function __construct(int $ddd, string $number){
        $this->ddd = $ddd;
        $this->number = $number;
    }

    // Declara os métodos getters e setters
    public function getDdd(): int {
        return $this->ddd;
    }

    public function setDdd(int $ddd): void {
        $this->ddd = $ddd;
    }

    public function getNumber(): string {
        return $this->number;
    }

    public function setNumber(string $number): void {
        $this->number = $number;
    }

    // Método para exibir as informações do telefone em string (já que não pode utilizar var_dump)
    public function __toString(): string {
        return "({$this->ddd}) $this->number";
    }
}
?>