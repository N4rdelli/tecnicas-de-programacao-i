<?php
declare(strict_types=1);

// Inclui aqui todas as classes que estõ sendo utilizaddas
require_once './classes/Person.php'; 
require_once './classes/Owner.php';
require_once './classes/Shopping.php';
require_once './classes/Store.php';
require_once './classes/Condominium.php';



// Instanciamos as classes que herdam de Pessoa (nesse caso, Proprietário e Shopping)
$owner = new Owner('Ricardo Almeida', '111.222.333-44');
$shopping = new Shopping('Shopping Center SP', '12.345.678/0001-90');

// Instanciamos as lojas
$store1 = new Store(3, '101A', $owner, $shopping);
$store2 = new Store(1, '205B', $owner, $shopping);

// Intanciamos o objeto princiipal, o Condomínio
$condominium = new Condominium(
    '2025-11-01',       // data_geracao
    1850.75,            // valor
    '2025-11-10'        // data_pagamento
);

// E adicionamos as lojas ao Condomínio
$condominium->addStore($store1);
$condominium->addStore($store2);
?>

<!-- Formatamos o resultado do exercício em HTML com Tailwind css -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 4</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 p-8 font-sans">
    <div class="max-w-6xl mx-auto bg-white shadow-2xl rounded-xl p-8">
        <header class="mb-8 pb-4 border-b-4 border-indigo-700">
            <h3 class='text-xl font-semibold text-gray-700 mb-4'>Exercício 4</h3>
            <h1 class="text-3xl font-extrabold text-indigo-800"> Sistema para Condomínio Comercial ✅</h1>
        </header>
        
        <div class="space-y-6">
            <?= $condominium ?>
        </div>

        <footer class="mt-8 pt-4 border-t text-sm text-gray-500">
            <p>Implementação: Classes de domínio utilizando tipagem estrita e método mágico __toString() com Heredoc para exibição formatada.</p>
        </footer>
    </div>
</body>
</html>