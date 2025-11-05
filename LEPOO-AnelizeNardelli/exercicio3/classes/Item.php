<?php
declare(strict_types=1);
// require_once './Service.php';

class Item {
    // Adiciona os atributos privados da classe Item
    private string $time;
    private string $status;

    // E adiciona os atributos que são objetos de outra classe
    private Service $service; 

    // Cria as strings possíveis para status
    public const STATUS_ACTIVE = 'Ativo';
    public const STATUS_CANCELED = 'Cancelado';

    // Chamamos o constructor da classe para inicializar os atributos
    public function __construct(string $time, string $status, Service $service) {
        // Valida o status
        if (!in_array($status, [self::STATUS_ACTIVE, self::STATUS_CANCELED])) {
            throw new InvalidArgumentException("Status inválido. Use 'Ativo' ou 'Cancelado'.");
        }
        $this->time = $time;
        $this->status = $status;
        $this->service = $service;
    }

    // Declara os métodos getters e setters
    public function getTime(): string {
        return $this->time;
    }

    public function setTime(string $time){
        $this->time = $time;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status): void {
        // Faz a validação do status
        if (!in_array($status, [self::STATUS_ACTIVE, self::STATUS_CANCELED])) {
            throw new InvalidArgumentException("Status inválido. Use 'Ativo' ou 'Cancelado'.");
        }
        $this->status = $status;
    }

    public function getService(): Service {
        return $this->service;
    }

    public function setService(Service $service): void {
        $this->service = $service;
    }
    
    public function __toString(): string
    {
        // Primeiro já formata a saída com base no status settado
        $statusClass = ($this->status === self::STATUS_ACTIVE) ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800 line-through';
        $statusIcon = ($this->status === self::STATUS_ACTIVE) ? '✅' : '❌';
        
        // E depois exibe no bloco HTML
        return <<<HTML_OUTPUT
            <div class='p-4 border-b border-gray-200'>
                <div class='flex justify-between items-center mb-2'>
                    <span class='text-xl font-bold text-gray-800'>⏰ {$this->time}</span>
                    <span class='px-3 py-1 text-xs font-semibold rounded-full {$statusClass}'>
                        {$statusIcon} {$this->status}
                    </span>
                </div>
                {$this->service} 
            </div>
        HTML_OUTPUT;
    }
}