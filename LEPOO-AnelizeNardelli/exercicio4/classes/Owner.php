<?php
declare(strict_types=1);
// require_once './Person.php';

// Cria a subclasse Owner, que herda de Person
class Owner extends Person
{
    // Adiciona os atributos específicos da subclasse e inicializa com o construct
    private string $cpf;

    public function __construct(string $name, string $cpf)
    {
        parent::__construct($name); 
        $this->cpf = $cpf;
    }

    // Declara os métodos getters e setters
    public function getCpf(): string { return $this->cpf; }
    public function setCpf(string $cpf): void { $this->cpf = $cpf; }
    
    // E formata a saída em HTML
    public function __toString(): string
    {
        return <<<HTML_OUTPUT
            <div class='p-4 border-l-4 border-purple-500 bg-purple-50 rounded-md'>
                <p class='text-lg font-bold text-purple-800'>🧑‍💼 Proprietário:</p>
                <p>Nome: <span class='font-medium'>{$this->name}</span></p>
                <p>CPF: <span class='text-sm text-gray-600'>{$this->cpf}</span></p>
            </div>
        HTML_OUTPUT;
    }
}