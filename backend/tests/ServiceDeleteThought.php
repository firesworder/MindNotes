<?php
require_once getenv('PROJECT_DIR') . '/config/bootstrap.php';

use App\EntityManagerContainer;
use App\Service\Thought\CreateThought;
use App\Service\Thought\DeleteThought;
use App\Service\Thought\EditThought;

$entityManager = EntityManagerContainer::getEntityManager();

$entityProps = [
    'id' => 2,
];

$service = new DeleteThought($entityManager);
echo 'Удалена мысль? ' . $service->execute($entityProps);
