<?php


namespace App\Controller;
use Doctrine\ORM\EntityManager;

class AbstractController
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}