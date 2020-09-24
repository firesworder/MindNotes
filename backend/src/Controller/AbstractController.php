<?php


namespace App\Controller;
use App\EntityManagerContainer;
use Doctrine\ORM\EntityManager;

class AbstractController
{
    protected EntityManager $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManagerContainer::getEntityManager();
    }
}