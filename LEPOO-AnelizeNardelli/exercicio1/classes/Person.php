<?php
declare(strict_types=1);

require_once 'Phone.php'; // Importa a classe Phone para usar como atributo

// Cria uma classe abstrata, ou seja, que não pode ser instanciada diretamente e só serve para ser herdada
abstract class Person{
    // Declara os0 atributos protegidos da classe
    protected string $name;
    protected array $phones;

    // Constructor da classe para inicializar os atributos
    public function __construct(string $name, Phone $primaryPhone){
        $this->name = $name;
        $this->phones = [$primaryPhone];
    }

    // Declara os métodos getters e setters
    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getPhones(): array {
        return $this->phones;
    }

    public function addPhone(Phone $phone): void {
        $this->phones[] = $phone;
    }
}
?>