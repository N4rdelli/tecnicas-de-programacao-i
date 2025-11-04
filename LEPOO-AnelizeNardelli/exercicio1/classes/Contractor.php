<?php
declare(strict_types=1);
require_once 'Person.php'; // Essa é a superclasse que vai servir de base para a classe Contractor

// Cria a subclasse Contractor, que herda de Person
class Contractor extends Person
{
    // Adiciona os atributos específicos da classe Contractor
    private string $cnpj;

    // Constructor da classe para inicializar os atributos
    public function __construct(string $name, string $cnpj, Phone $primaryPhone)
    {
        // Chama o constructor da superclasse para inicializar o atributo herdado
        parent::__construct($name, $primaryPhone);
        $this->cnpj = $cnpj;
    }

    // Declara os métodos getters e setters
    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): void
    {
        $this->cnpj = $cnpj;
    }

    // Método para exibir as informações do contratado em string
    public function __toString(): string
    {
        // Primeiro constrói a lista em HTML
        $phoneListHtml = '';
        foreach ($this->getPhones() as $phone) {
            $phoneListHtml .= "<li>{$phone}</li>";
        }

        // E depois retorna o bloco HTML formatado
        return <<<HTML_OUTPUT
            <div class='p-4 border-l-4 border-green-500 bg-green-50'>
                <p class='text-lg font-semibold text-green-800'>Contratado (Pessoa Jurídica):</p>
                <p>Nome: <span class='font-medium'>{$this->name}</span></p>
                <p>CNPJ: <span class='text-sm text-gray-600'>{$this->cnpj}</span></p>

                <div class='mt-2'>
                    <p class='font-medium text-sm text-gray-700'>Contatos:</p>
                    <ul class='list-disc list-inside ml-4 text-sm text-gray-600'>
                        {$phoneListHtml}
                    </ul>
                </div>
            </div>
        HTML_OUTPUT;
    }
}
?>