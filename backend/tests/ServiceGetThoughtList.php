<?php
require_once getenv('PROJECT_DIR') . '/config/bootstrap.php';

use App\EntityManagerContainer;
use App\Service\Thought\GetThoughtList;

$entityManager = EntityManagerContainer::getEntityManager();
$service = new GetThoughtList($entityManager);
$thoughtList = $service->execute();

print_r($thoughtList);