<?php
require_once getenv('PROJECT_DIR') . '/config/bootstrap.php';

use App\EntityManagerContainer;
use App\Service\Thought\CreateThought;
use App\Service\Thought\EditThought;

$entityManager = EntityManagerContainer::getEntityManager();

$entityProps = [
    'title' => 'Нормальный титульник',
    'tags' => [],
    'isProcessed' => true,
    'body' => 'Нормальное тело',
];

$service = new EditThought($entityManager);
echo 'Обновлена мысль? ' . $service->execute(array_merge(['id' => 1], $entityProps));
