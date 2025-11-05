<?php
declare(strict_types=1);

// Declara a classe abstrata Person,, que irá servir de superclasse para outras
abstract class Person {
    // Adiciona os atributos protegidos dessa classe abstrata
    protected string $name;
    protected string $cellphone;

    // Constructor da classe
    public function __construct(string $name, string $cellphone) {
        $this->name = $name;
        $this->cellphone = $cellphone;
    }

    // Adiciona os métodos getters e setter
    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getCellphone(): string {
        return $this->cellphone;
    }

    public function setCellphone(string $cellphone): void {
        $this->cellphone = $cellphone;
    }
}