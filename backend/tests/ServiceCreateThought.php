<?php
require_once getenv('PROJECT_DIR') . '/config/bootstrap.php';

use App\EntityManagerContainer;
use App\Service\Thought\CreateThought;

$entityManager = EntityManagerContainer::getEntityManager();

$entityManagerProperties = [
    'title' => 'testProperty',
    'tags' => [],
    'isProcessed' => false,
    'body' => 'Я суть описываемой мысли',
];

$service = new CreateThought($entityManager);
echo 'Создана мысль с id=' . $service->execute($entityManagerProperties);
