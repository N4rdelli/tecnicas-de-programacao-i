<?php
declare(strict_types=1);

// Inclui todas as classes já criadas que terão um relacionamento com a classe Party
require_once 'Client.php';
require_once 'Contractor.php';
require_once 'Decoration.php';

class Party
{
    // Declara os atributos privados da classe Party
    private string $contractDate;
    private string $partyDate;
    private float $value;

    // Declara os atributos que são objetos de outras classes
    private Client $client;
    private Contractor $contractor;
    private array $decorations;

    // Constructor da classe para inicializar tudo
    public function __construct(string $contractDate, string $partyDate, float $value, Client $client, Contractor $contractor)
    {
        $this->contractDate = $contractDate;
        $this->partyDate = $partyDate;
        $this->value = $value;
        $this->client = $client;
        $this->contractor = $contractor;
        $this->decorations = [];
    }

    // Método para adicionar decorações ao array de decorações
    public function addDecoration(Decoration $decoration): void
    {
        $this->decorations[] = $decoration;
    }

    // Método para exibir as informações da festa em string
    public function __toString(): string
    {
        // Primeiro gera a lista de decorações em HTML
        $decorationListHtml = '';
        if (empty($this->decorations)) {
            $decorationListHtml = "<li class='text-gray-500'>Nenhuma decoração registrada.</li>";
        } else {
            foreach ($this->decorations as $decoration) {
                $decorationListHtml .= "<li class='bg-yellow-50 p-2 rounded-md border border-yellow-200 text-sm'>🎨 {$decoration}</li>";
            }
        }

        // Também já valida e formata o valor total
        $formattedValue = number_format($this->value, 2, ',', '.');

        // E depois retorna a estrutura HTMl completa
        return <<<HTML_OUTPUT
            <div class='bg-gray-50 p-6 rounded-lg border border-gray-200'>
                <h2 class='text-2xl font-bold text-gray-800 mb-4'>Detalhes do Contrato de Festa</h2>
                
                <div class='grid grid-cols-3 gap-4 text-sm mb-8 p-4 bg-white rounded-md shadow-inner'>
                    <div><p class='font-medium text-gray-500'>Data Contrato</p><p class='font-bold'>{$this->contractDate}</p></div>
                    <div><p class='font-medium text-gray-500'>Data Festa</p><p class='font-bold text-pink-400'>{$this->partyDate}</p></div>
                    <div><p class='font-medium text-gray-500'>Valor Total</p><p class='font-bold text-3xl text-green-600'>R$ {$formattedValue}</p></div>
                </div>

                <h3 class='text-xl font-semibold text-gray-700 mt-6 mb-4 border-t pt-4'>Envolvidos (Agregação)</h3>
                <div class='grid md:grid-cols-2 gap-6'>
                    <div>{$this->client}</div>      <div>{$this->contractor}</div>  </div>

                <h3 class='text-xl font-semibold text-gray-700 mt-8 mb-4 border-t pt-4'>Decorações (Composição)</h3>
                <ul class='list-none space-y-3'>
                    {$decorationListHtml}
                </ul>
            </div>
        HTML_OUTPUT;
    }
}
?>