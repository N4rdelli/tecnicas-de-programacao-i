<?php
declare(strict_types=1);

// Chama todas as classes criadas que irão ter um relacionamento com a classe Assessment
require_once 'Evaluator.php';
require_once 'Recipe.php';

class Assessment {
    // Declara o atributo privado específico da classe
    private float $grade;

    // Declara os atributos que são objetos de outras classes
    private Evaluator $evaluator;
    private Recipe $recipe; 


    // Constructor: inicializa tanto os atributos específicos quando os herdados
    public function __construct(float $grade, Evaluator $evaluator, Recipe $recipe) {
        if ($grade < 0.0 || $grade > 5.0) {
            throw new InvalidArgumentException("A nota deve estar entre 0.0 e 5.0.");
        }
        $this->grade = $grade;
        $this->evaluator = $evaluator;
        $this->recipe = $recipe;
    }

    // Declara os métodos getters e setters
    public function getGrade(): float {
        return $this->grade;
    }

    public function setGrade(float $grade): void {
        $this->grade = $grade;
    }

    public function __toString(): string {
        // Formata anteriormente a nota dada pela avaliação
        $gradeDisplay = number_format($this->grade, 1, ',', '.');
        $gradeColor = ($this->grade >= 4.0) ? 'text-green-600' : 
                      (($this->grade >= 2.5) ? 'text-yellow-600' : 'text-red-600');

        // E exibe o HTML completo
        return <<<HTML_OUTPUT
            <div class='bg-white p-8 rounded-xl shadow-lg border-t-8 border-green-700'>
                <h2 class='text-3xl font-extrabold text-green-700 mb-6'>✅ Avaliação Registrada</h2>
                
                <div class='bg-gray-100 p-4 rounded-lg mb-6 flex justify-between items-center'>
                    <div>
                        <p class='text-sm font-medium text-gray-600'>Nota da Avaliação (máx. 5.0)</p>
                        <p class='text-5xl font-black {$gradeColor}'>{$gradeDisplay}</p>
                    </div>
                </div>

                <h3 class='text-xl font-semibold text-gray-700 mt-6 mb-3 border-t pt-4'>🍽️ Receita Avaliada:</h3>
                {$this->recipe} <h3 class='text-xl font-semibold text-gray-700 mt-8 mb-3 border-t pt-4'>🧑‍⚖️ Avaliador Responsável:</h3>
                {$this->evaluator} </div>
        HTML_OUTPUT;
    }
}