<?php
declare(strict_types=1);

// Fazemos a requisição das classes
require_once '../exercicio1/classes/Person.php'; // Reutiliza a classe Person do primeiro exercício

require_once './classes/Chef.php';
require_once './classes/Evaluator.php';
require_once './classes/Recipe.php';
require_once './classes/Assessment.php';


// Primeiro nós instanciamos o Chef
$chefPhone = new Phone(11, '99123-4567');
$chef = new Chef(
    'Chef Antônio de Lé Silvé',
    $chefPhone,
    'Culinária Francesa'
);

// Depois nós instanciamos o Avaliador
$evaluatorPhone = new Phone(21, '98765-4321');
$evaluator = new Evaluator(
    'Dr. Carlos Sanzovo Martionelli',
    $evaluatorPhone,
    '222.333.444-55'
);

// Daí instanciamos uma receita
$recipe = new Recipe(
    'Risoto de Cogumelos Selvagens',
    'Arroz Arbóreo; Caldo de Legumes; Cogumelos Porcini; Vinho Branco Seco; Queijo Parmesão; Manteiga'
);
$chef->addRecipe($recipe); // E relacionamos ela com o Chef

// E finalmente instanciamos a Avaliação
$assessment = new Assessment(
    4.5, // Nota
    $evaluator, // Objeto Avaliador
    $recipe     // Objeto Receita
);
?>

<!-- E então exibimos a Avaliação em HTML, formatado com Tailwind CSS -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200 p-8 font-sans">
    <div class="max-w-4xl mx-auto bg-white shadow-2xl rounded-xl p-8">
        <div>
            <h3 class='text-xl font-semibold text-gray-700 mb-4'>Exercício 2</h3>
            <h1 class="text-3xl font-bold text-indigo-700 mb-6 border-b-2 pb-2">Sistema de Avaliação de Receitas ⭐</h1>
        </div>

        <div class="space-y-6">
            <?= $assessment ?>
        </div>
    </div>
</body>

</html>