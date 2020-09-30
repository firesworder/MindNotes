<?php


namespace App\Service;


use Doctrine\ORM\EntityManager;

abstract class AbstractService
{
    protected EntityManager $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    // TODO: учитывая мои планы потом доработать так, чтобы на вход я получал параметры сущности
    // потом может понадобиться это менять. Ну или остановиться на передаче array $params, и мб это будет
    // даже правильнее
    public abstract function execute(array $params);
}