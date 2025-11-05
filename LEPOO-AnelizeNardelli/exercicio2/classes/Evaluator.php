<?php
declare(strict_types=1);

// Cria a classe Evaluator, que herda de Person
class Evaluator extends Person {
    // Declara os atributos específicos dessa subclasse (nesse caso, somente o cpf)
    private string $cpf;

    // Construtor da classe
    public function __construct(string $name, Phone $primaryPhone, string $cpf) {
        parent::__construct($name, $primaryPhone);
        $this->cpf = $cpf;
    }

    // Adiciona os métodos Getters e Setters

    public function getCpf(): string {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void {
        $this->cpf = $cpf;
    }

    public function __toString(): string {
        // Gera o HTML da lista de telefones
        $phoneListHtml = '';
        foreach ($this->getPhones() as $phone) {
            $phoneListHtml .= "<li>{$phone}</li>"; 
        }

        // E exibe o HTML completo formatado
        return <<<HTML_OUTPUT
            <div class='p-4 border-l-4 border-indigo-500 bg-indigo-50 rounded-md'>
                <p class='text-lg font-bold text-indigo-800'>Avaliador:</p>
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