<?php
declare(strict_types=1);

class Recipe {
    // Declara os atributos privados da classe
    private string $name;
    private string $ingredients; // Vamos separar os ingredientes por ponto e vírgula

    // Constructor da classe
    public function __construct(string $name, string $ingredients) {
        $this->name = $name;
        $this->ingredients = $ingredients;
    }

    // Declara os métodos getters e setters
    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getIngredients(): string {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): void {
        $this->ingredients = $ingredients;
    }


    // Método para exibir as informações em HTML com Tailwind CSS
    public function __toString(): string {
        // Primeiro limpamos e formatamos os ingredientes para exibição em lista HTML
        $ingredientsList = explode(';', $this->ingredients);
        $ingredientsHtml = "<ul class='list-disc list-inside ml-4 text-sm text-gray-600 space-y-1'>";
        foreach ($ingredientsList as $ingredient) {
            $ingredientsHtml .= "<li>" . trim($ingredient) . "</li>";
        }
        $ingredientsHtml .= "</ul>";

        // E exibe o bloco HTML formatado
        return <<<HTML_OUTPUT
            <div class='bg-white p-4 rounded-md shadow-inner border border-red-200'>
                <p class='text-xl font-bold text-red-700'>{$this->name}</p>
                <h4 class='font-semibold text-gray-700 mt-2'>Ingredientes:</h4>
                {$ingredientsHtml}
            </div>
        HTML_OUTPUT;
    }
}