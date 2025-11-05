<?php
declare(strict_types=1);
// require_once './Owner.php';
// require_once './Shopping.php';

// Cria a classe
class Store
{
    // Adiciona os atributos privados da classe
    private int $lots;
    private string $number;

    // E adiciona os atributos que são objetos de outra classe
    private Owner $owner;
    private Shopping $shopping;

    // Construct
    public function __construct(int $lots, string $number, Owner $owner, Shopping $shopping)
    {
        $this->lots = $lots;
        $this->number = $number;
        $this->owner = $owner;
        $this->shopping = $shopping;
    }

    // Declara os métodos getters e setters
    public function getLots(): int { return $this->lots; }
    public function setLots(int $lots): void { $this->lots = $lots; }
    public function getNumber(): string { return $this->number; }
    public function setNumber(string $number): void { $this->number = $number; }
    public function getOwner(): Owner { return $this->owner; }
    public function setOwner(Owner $owner): void { $this->owner = $owner; }
    public function getShopping(): Shopping { return $this->shopping; }
    public function setShopping(Shopping $shopping): void { $this->shopping = $shopping; }

    // E faz a exibição em HTML
    public function __toString(): string
    {
        return <<<HTML_OUTPUT
            <div class='bg-gray-100 p-4 rounded-lg shadow-sm border-l-8 border-blue-500'>
                <h3 class='text-xl font-bold text-blue-800 mb-3'>🏬 Loja: {$this->number}</h3>
                <p class='text-sm text-gray-700 mb-4'>Lotes Utilizados: <span class='font-semibold'>{$this->lots}</span></p>
                
                <div class='mt-4 space-y-3'>
                    <div class='p-2 bg-white rounded border border-gray-200'>
                        <p class='text-sm font-semibold'>Proprietário:</p>
                        {$this->owner}
                    </div>
                    <div class='p-2 bg-white rounded border border-gray-200'>
                        <p class='text-sm font-semibold'>Shopping:</p>
                        {$this->shopping}
                    </div>
                </div>
            </div>
        HTML_OUTPUT;
    }
}