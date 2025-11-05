<?php
declare(strict_types=1);
// require_once 'Recipe.php';

// Cria a subclasse Chef, que herda de Person
class Chef extends Person {
    // Declara os atributos que serão esspecíficos da classe Chef (nesse caso, só Especialidade)
    private string $specialty;

    // Relaciona o Chefe com suas Receitas
    private array $recipes;


    // Constructor da classe para inicializar os atributos
    public function __construct(string $name, Phone $primaryPhone, string $specialty) {
        parent::__construct($name, $primaryPhone);
        $this->specialty = $specialty;
        $this->recipes = [];
    }

    // Declara os métodos getters e setters
    public function getSpecialty(): string {
        return $this->specialty;
    }

    public function setSpecialty(string $specialty): void{
        $this->specialty = $specialty;
    }

    // Declara os métodos específicos da classe Chef
    public function addRecipe(Recipe $recipe): void {
        $this->recipes[] = $recipe;
    }

    public function __toString(): string {
        // Gera o HTML da lista de telefones
        $phoneListHtml = '';
        foreach ($this->getPhones() as $phone) {
            $phoneListHtml .= "<li>{$phone}</li>";
        }

        // E exibe o HTML formatado
        return <<<HTML_OUTPUT
            <div class='p-4 border-l-4 border-yellow-500 bg-yellow-50 rounded-md'>
                <p class='text-lg font-bold text-yellow-800'>Chef Criador:</p>
                <p>Nome: <span class='font-medium'>{$this->name}</span></p>
                <p>Especialidade: <span class='text-sm text-gray-600'>{$this->specialty}</span></p>

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