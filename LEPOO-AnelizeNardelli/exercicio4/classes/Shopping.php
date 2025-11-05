<?php
declare(strict_types=1);
// require_once './Person.php';

// Cria a subclasse Shopping  que também herda de Person, mas com cnpj
class Shopping extends Person
{
    // Adiciona os atributos privados que são específicos dessa subclasse e inicializa
    private string $cnpj;

    public function __construct(string $name, string $cnpj)
    {
        parent::__construct($name); 
        $this->cnpj = $cnpj;
    }

    // Declara os métodos getters e setters
    public function getCnpj(): string { return $this->cnpj; }
    public function setCnpj(string $cnpj): void { $this->cnpj = $cnpj; }

    // E formata a saída
    public function __toString(): string
    {
        return <<<HTML_OUTPUT
            <div class='p-4 border-l-4 border-red-500 bg-red-50 rounded-md'>
                <p class='text-lg font-bold text-red-800'>🛍️ Shopping:</p>
                <p>Nome: <span class='font-medium'>{$this->name}</span></p>
                <p>CNPJ: <span class='text-sm text-gray-600'>{$this->cnpj}</span></p>
            </div>
        HTML_OUTPUT;
    }
}