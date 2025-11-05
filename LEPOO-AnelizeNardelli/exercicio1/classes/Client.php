<?php
declare(strict_types=1);
// require_once 'Person.php'; // Essa é a superclasse que vai servir de base para a classe Client

// Cria a subclasse Client, que herda de Person
class Client extends Person
{
    // Adiciona os atributos específicos da classe Client
    private string $cpf;

    // Constructor da classe para inicializar os atributos
    public function __construct(string $name, string $cpf, Phone $primaryPhone)
    {
        // Chama o constructor da superclasse para inicializar o atributo herdado
        parent::__construct($name, $primaryPhone);
        $this->cpf = $cpf;
    }

    // Declara os métodos getters e setters
    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    // Método para exibir as informações do cliente em string
    public function __toString(): string
    {
        $phoneListHtml = '';
        foreach ($this->getPhones() as $phone) {
            $phoneListHtml .= "<li>{$phone}</li>";
        }

        return <<<HTML_OUTPUT
            <div class='p-4 border-l-4 border-indigo-500 bg-indigo-50'>
                <p class='text-lg font-semibold text-indigo-800'>Cliente:</p>
                <p>Nome: <span class='font-medium'>{$this->name}</span></p>
                <p>CPF: <span class='text-sm text-gray-600'>{$this->cpf}</span></p>

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