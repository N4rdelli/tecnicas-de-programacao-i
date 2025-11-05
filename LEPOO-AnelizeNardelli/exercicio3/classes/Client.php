<?php
declare(strict_types=1);
// require_once './Person.php'; // A superclasse Person serve de base para a classe Client

// Cria a subclasse Client, que herda de Person
class Client extends Person {
    // Adiciona os atributos privados específicos dessa classe
    private string $cpf;

    // Construtor
    public function __construct(string $name, string $cellphone, string $cpf) {
        parent::__construct($name, $cellphone);
        $this->cpf = $cpf;
    }
    
    // Declara os métodos getters e setters
    public function getCpf(): string {
        return $this->cpf;
    }
    public function setCpf(string $cpf): void
    {
        // Verifica se o CPF tem o formato correto
        if (strlen($cpf) !== 14 || !preg_match('/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/', $cpf)) {
        }
        $this->cpf = $cpf;
    }
    
    // E formatamos a exibição em HTML
    public function __toString(): string
    {
        return <<<HTML_OUTPUT
            <div class='p-4 border-l-4 border-indigo-500 bg-indigo-50 rounded-md'>
                <p class='text-lg font-bold text-indigo-800'>Cliente:</p>
                <p>Nome: <span class='font-medium'>{$this->name}</span></p>
                <p>Celular: <span class='text-sm text-gray-600'>{$this->cellphone}</span></p>
                <p>CPF: <span class='text-sm text-gray-600'>{$this->cpf}</span></p>
            </div>
        HTML_OUTPUT;
    }
}