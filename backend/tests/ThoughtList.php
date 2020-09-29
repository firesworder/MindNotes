<?php
require_once getenv('PROJECT_DIR') . '/config/bootstrap.php';

use App\EntityManagerContainer;

$entityManager = EntityManagerContainer::getEntityManager();

echo "Текущие строки:\n";
$repository = $entityManager->getRepository(\App\Entity\Thought::class);
$thoughts = $repository->findAll();

foreach ($thoughts as $thought) {
    echo sprintf("-%s\n", $thought->getBody());
}