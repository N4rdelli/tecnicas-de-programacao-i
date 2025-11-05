<?php
declare(strict_types=1);
// require_once './Person.php'; // A superclasse Person também serve de base para a claasse Provider

// Cria a classe Provider, que herda de Person
class Provider extends Person {
    // Adiciona os atributos que são específicos dessa subclasse
    private string $specialty;

    // Chama o constructor
    public function __construct(string $name, string $cellphone, string $specialty) {
        parent::__construct($name, $cellphone);
        $this->specialty = $specialty;
    }

    // Delara os métodos getters e setters
    public function getSpecialty(): string {
        return $this->specialty;
    }

    public function setSpecialty(string $specialty): void {
        $this->specialty = $specialty;
    }

    // E formata a exibição de dados em HTML
    public function __toString(): string
    {
        return <<<HTML_OUTPUT
            <div class='p-4 border-l-4 border-yellow-500 bg-yellow-50 rounded-md'>
                <p class='text-lg font-bold text-yellow-800'>Prestador:</p>
                <p>Nome: <span class='font-medium'>{$this->name}</span></p>
                <p>Celular: <span class='text-sm text-gray-600'>{$this->cellphone}</span></p>
                <p>Especialidade: <span class='font-medium text-yellow-700'>{$this->specialty}</span></p>
            </div>
        HTML_OUTPUT;
    }
}