<?php
declare(strict_types=1);

// Declaramos todas as classes que estão sendo utilizadas
require_once './classes/Person.php';
require_once './classes/Client.php';
require_once './classes/Provider.php';
require_once './classes/Service.php';
require_once './classes/Item.php';
require_once './classes/Schedule.php';

// Instanciamos um novo Cliente
$client = new Client(
    'Patrícia Souza',
    '(11) 98765-1234',
    '555.444.333-22'
);

// Insttanciamos um Prestador de Serviços
$provider = new Provider(
    'André Cabelereiro',
    '(11) 99876-5432',
    'Corte e Coloração'
);

// Instanciamos os Serviços que podem ser prestados
$service1 = new Service('Corte Feminino', 85.00);
$service2 = new Service('Hidratação Capilar', 50.00);
$service3 = new Service('Manicure', 35.00);


// Instanciamos os Items que serão colocados na Agenda
$item1 = new Item('10:00', Item::STATUS_ACTIVE, $service1);
$item2 = new Item('11:00', Item::STATUS_ACTIVE, $service2);
$item3 = new Item('11:30', Item::STATUS_CANCELED, $service3);

// Instanciamos o objeto principal, a Agenda
$schedule = new Schedule(
    '2026-02-18',
    $client,
    $provider
);

// E fnalmente adicionamos os itens à agenda
$schedule->addItem($item1);
$schedule->addItem($item2);
$schedule->addItem($item3);
?>

<!-- Agora iremos exibir o resultado final em HTML com Tailwind CSS -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200 p-8 font-sans">
    <div class="max-w-4xl mx-auto bg-white shadow-2xl rounded-xl p-8">
        <div>
            <h3 class='text-xl font-semibold text-gray-700 mb-4'>Exercício 3</h3>
            <h1 class="text-3xl font-bold text-indigo-700 mb-6 border-b-2 pb-2">Sistema de Agenda 💇‍♀️</h1>
        </div>

        <div class="space-y-6">
            <?= $schedule ?>
        </div>
    </div>
</body>

</html>