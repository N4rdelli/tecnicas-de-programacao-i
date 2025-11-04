<?php
declare(strict_types=1);

class Decoration {
    // Declara os atributos privados da classe (nesse caso, só a descrição)
    private string $description;

    // Constructor da classe
    public function __construct(string $description) {
        $this->description = $description;
    }

    // Declara os métodos getters e setters
    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    // Método para exibir as informações do telefone em string (já que não pode utilizar var_dump)
    public function __toString(): string {
        return $this->description;
    }
}