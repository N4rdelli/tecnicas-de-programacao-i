<?php
declare(strict_types=1);
// require_once './Client.php';
// require_once './Provider.php';
// require_once './Item.php';

// Cria a classe Schedule
class Schedule {
    // Adiciona os atributos privados dessa classe
    private string $date;

    // E adicion os atributos que são objetos de outras classes
    private Client $client; 
    private Provider $provider;
    
    // Inicializa um array para servir como lista de itens
    private array $items;

    // Chama oconstruct
    public function __construct(string $date, Client $client, Provider $provider) {
        $this->date = $date;
        $this->client = $client;
        $this->provider = $provider;
        $this->items = [];
    }
    
    // Declara os métodos para adicionar itens
    public function addItem(Item $item): void {
        $this->items[] = $item;
    }
    
    public function __toString(): string {
        // Primeiro nós formatamos a lista de itens para o HTML
        $itemsListHtml = '';
        if (empty($this->items)) {
            $itemsListHtml = "<p class='text-gray-500 p-4'>Nenhum serviço agendado para esta data.</p>";
        } else {
            foreach ($this->items as $item) {
                $itemsListHtml .= $item;
            }
        }
        
        // E daí nós exibimos o bloco HTMLL formatado
        return <<<HTML_OUTPUT
            <div class='bg-white p-8 rounded-xl shadow-lg border-t-8 border-green-700'>
                <h2 class='text-3xl font-extrabold text-green-700 mb-6'>🗓️ Agenda de Serviços: {$this->date}</h2>
                
                <h3 class='text-xl font-semibold text-gray-700 mb-4 border-b pb-2'>Envolvidos</h3>
                <div class='grid md:grid-cols-2 gap-6 mb-8'>
                    <div>{$this->client}</div>
                    <div>{$this->provider}</div>
                </div>

                <h3 class='text-xl font-semibold text-gray-700 mt-6 mb-4 border-t pt-4 border-b pb-2'>Serviços/Itens Agendados (1..*)</h3>
                <div class='space-y-4 border rounded-lg overflow-hidden'>
                    {$itemsListHtml}
                </div>
            </div>
        HTML_OUTPUT;
    }
}