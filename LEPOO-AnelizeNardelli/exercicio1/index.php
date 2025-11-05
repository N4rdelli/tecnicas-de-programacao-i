<?php
declare(strict_types=1);
require_once './classes/Phone.php';
require_once './classes/Person.php'; 
require_once './classes/Client.php';
require_once './classes/Contractor.php';
require_once './classes/Decoration.php';
require_once './classes/Party.php';

// Primeiro nós instanciamos o Cliente
$clientPhone = new Phone(14, '99191-9191'); // Como o telefone é um objeto dentro de Clientee, precisamos instanciá-lo primeiro
$client = new Client('Anelize Nardelli', '123.456.789-00', $clientPhone);

// Depois instanciamos o Contratado (que assim como o Cliente, é uma dependência daa Festa)
$contractorPhone = new Phone(11, '99898-9898');
$contractor = new Contractor('Festas & Cia', '12.345.678/0001-99', $contractorPhone);

// Agora instanciamos as Decorações
$decoration1 = new Decoration('Balões coloridos e fitas decorativas.');
$decoration2 = new Decoration('Iluminação especial com luz neon.');

// Finalmente, instanciamos a Festa, passando as dependências já criadas
$party = new Party(
    '2025-07-25',
    '2025-10-15',
    2578.90,
    $client,
    $contractor
);

// Por último, adicionamos as decorações à festa
$party->addDecoration($decoration1);
$party->addDecoration($decoration2);
?>

<!-- Aqui nós exibimos as informações da festa em HTML -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Exercício 1</title>
</head>

<body class="bg-gray-200 p-8 font-sans">
    <div class="max-w-5xl mx-auto bg-white shadow-2xl rounded-xl p-8">
        <header class="mb-8 pb-4 border-b-4 border-indigo-500">
            <h3 class='text-xl font-semibold text-gray-700 mb-4'>Exercício 1</h3>
            <h1 class="text-3xl font-extrabold text-indigo-800"> Sistema de Gestão de Festas 🎉</h1>
        </header>

        <div class="space-y-6">
            <?= $party ?>
        </div>
        <footer class="mt-8 pt-4 border-t text-sm text-gray-500">
            <p>Implementação com __toString(), Heredoc e Tipagem Estrita.</p>
        </footer>
    </div>
</body>

</html>