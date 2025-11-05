<?php
declare(strict_types=1);

$exercises = [
    [
        'number' => 'Exercício 1',
        'title' => 'Sistema de Gestão de Festas',
        'description' => 'Demonstra Herança, Agregação (Cliente/Contratado) e Composição (Decoração).',
        'file' => './exercicio1/index.php',
        'color' => 'indigo-600',
        'icon' => '🎉'
    ],
    [
        'number' => 'Exercício 2',
        'title' => 'Sistema de Avaliação de Receitas',
        'description' => 'Demonstra Herança (Chef/Avaliador) e Agregação (Avaliação da Receita), usando Enums.',
        'file' => './exercicio2/index.php',
        'color' => 'green-600',
        'icon' => '⭐'
    ],
    [
        'number' => 'Exercício 3',
        'title' => 'Agenda de Serviços (Salão)',
        'description' => 'Demonstra Herança (Cliente/Prestador) e Agregação (Itens da Agenda/Serviços).',
        'file' => './exercicio3/index.php',
        'color' => 'cyan-600',
        'icon' => '💇‍♀️'
    ],
    [
        'number' => 'Exercício 4',
        'title' => 'Sistema para Condomínio Comercial',
        'description' => 'Demonstra Herança (Proprietário/Shopping) e Agregação (Lojas e Cobrança).',
        'file' => './exercicio4/index.php',
        'color' => 'purple-600',
        'icon' => '✅'
    ],
];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="bg-gray-200 p-8 font-sans">
    <div class="max-w-4xl mx-auto bg-white shadow-2xl rounded-xl p-10">
        <header class="mb-4 pb-6">
            <h1 class="text-3xl font-extrabold text-indigo-800">Lista de Exercícios de POO em PHP 📚</h1>
            <p class="text-gray-500 mt-2 text-md">Projeto prático de Programação Orientada à Objetos. Veja a implementação de 4 soluções
                com PHP que demonstram conceitos de Herança, Agregação e Composição</p>
        </header>

        <div class="grid md:grid-cols-2 gap-6">
            <?php foreach ($exercises as $exercise): ?>
                <a href="<?= $exercise['file'] ?>"
                    class="card-hover transition-all duration-300 block p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-xl hover:border-gray-300 flex flex-col gap-3">
                    
                    <div class="flex flex-row justify-between border-b-4 border-<?= $exercise['color'] ?> pb-4">
                        <h3  class='text-xl font-semibold text-gray-700'>
                            <?= $exercise['number'] ?>
                        </h3>
                        <span class="text-lg">
                            <?= $exercise['icon'] ?>
                        </span>
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-<?= $exercise['color'] ?>">
                            <?= $exercise['title'] ?>
                        </h2>
                    </div>

                    <p class="text-gray-600 text-base h-full">
                        <?= $exercise['description'] ?>
                    </p>
                    
                    <div class="mt-4 text-right">
                        <span class="text-sm font-semibold text-blue-500 hover:text-blue-700">Resultado →</span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <footer class="mt-10 pt-4 border-t text-sm text-gray-500 text-center">
            <p>Feito por Anelize Nardelli para a disciplina de Técnicas de Programação I — Fatec Jahu DSM 2025I 2º Semestre.</p>
        </footer>
    </div>
</body>

</html>