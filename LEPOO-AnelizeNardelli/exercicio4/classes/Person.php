<?php
declare(strict_types=1);

// Cria a superclasse abstrata Person, que vai servir de base para outras
abstract class Person
{
    // Adiciona e inicializa seus atributos privados (nesse caso, só o nome)
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    // E declara os métodos getters e setters
    public function getName(): string { return $this->name; }
    public function setName(string $name): void { $this->name = $name; }
}