<?php
declare(strict_types=1);
// require_once './Store.php';

// Cria a classe cnetral Condominium
class Condominium
{
    // Adiciona os atributos privados da classe
    private string $generationDate;
    private float $value;
    private string $paymentDate;

    // Inicializa um array para a lista de lojas
    private array $stores; 

    // Inicializa os atributos
    public function __construct(string $generationDate, float $value, string $paymentDate)
    {
        $this->generationDate = $generationDate;
        $this->value = $value;
        $this->paymentDate = $paymentDate;
        $this->stores = [];
    }
    
    // Declara um método para adicionar uma loja no array
    public function addStore(Store $store): void
    {
        $this->stores[] = $store;
    }

    // Declara os métodos getters e setters
    public function getGenerationDate(): string { return $this->generationDate; }
    public function setGenerationDate(string $generationDate): void { $this->generationDate = $generationDate; }
    public function getValue(): float { return $this->value; }
    public function setValue(float $value): void { $this->value = $value; }
    public function getPaymentDate(): string { return $this->paymentDate; }
    public function setPaymentDate(string $paymentDate): void { $this->paymentDate = $paymentDate; }
    public function getStores(): array { return $this->stores; }

    public function __toString(): string
    {
        // Formata o valor de pagamento
        $formattedValue = number_format($this->value, 2, ',', '.');
        
        // Constrói a lista de Lojas em HTML
        $storesHtml = '';
        if (empty($this->stores)) {
            $storesHtml = "<p class='text-gray-500 p-4'>Nenhuma loja cadastrada.</p>";
        } else {
            foreach ($this->stores as $store) {
                $storesHtml .= $store;
            }
        }

        // E finalmente exibe o HTML formatado
        return <<<HTML_OUTPUT
            <div class='bg-gray-50 p-8 rounded-xl shadow-lg border-t-8 border-indigo-700'>
                <h2 class='text-3xl font-extrabold text-indigo-700 mb-6'>🏢 Cobrança de Condomínio Comercial</h2>
                
                <div class='grid grid-cols-3 gap-4 text-sm mb-8 p-4 bg-white rounded-lg shadow-md border-l-8 border-cyan-500'>
                    <div><p class='font-medium text-gray-500'>Mês de Geração</p><p class='font-bold text-gray-700'>{$this->generationDate}</p></div>
                    <div><p class='font-medium text-gray-500'>Data de Vencimento</p><p class='font-bold text-red-600'>{$this->paymentDate}</p></div>
                    <div><p class='font-medium text-gray-500'>Valor da Taxa</p><p class='font-black text-3xl text-green-600'>R$ {$formattedValue}</p></div>
                </div>

                <h3 class='text-xl font-semibold text-gray-700 mt-6 mb-4 border-t pt-4'>🛍️ Lojas/Unidades</h3>
                <div class='grid md:grid-cols-2 gap-6'>
                    {$storesHtml}
                </div>
            </div>
        HTML_OUTPUT;
    }
}