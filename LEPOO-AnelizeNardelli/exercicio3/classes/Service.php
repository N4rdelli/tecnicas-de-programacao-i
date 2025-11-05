<?php
declare(strict_types=1);

// Cria a classe Service
class Service {
    // Adiciona os atributos priivados da classe
    private string $description;
    private float $price;

    // Chama o seu método Construct, para inicializar os atributos
    public function __construct(string $description, float $price) {
        $this->description = $description;
        $this->price = $price;
    }

    // Declara os métodos getters e setters
    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description):void {
        $this->description = $description;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price):void {
        $this->price = $price;
    }
    
    public function __toString(): string
    {
        // Primeiro formatamos o Preço
        $formattedPrice = number_format($this->price, 2, ',', '.');

        // E depois exibimos ele com HTML
        return <<<HTML_OUTPUT
            <div class='bg-gray-100 p-3 rounded-md border border-gray-300 flex justify-between'>
                <span class='font-medium text-gray-700'>{$this->description}</span>
                <span class='font-bold text-lg text-green-600'>R$ {$formattedPrice}</span>
            </div>
        HTML_OUTPUT;
    }
}