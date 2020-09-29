<?php


namespace App\Service\Thought;


use App\Entity\Thought;
use Doctrine\ORM\EntityManager;

class CreateThought
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    // TODO: превратить потом array в непосредственно сущность?!
    public function execute(array $params)
    {
        // проверка валидности входящих параметров
        if(!$this->isValid()) {
            return false;
        }

        // формирование объекта сущности
        $thoughtObject = new Thought();
        $thoughtObject->setTitle($params['title']);
        $thoughtObject->setIsProcessed($params['isProcessed']);
        $thoughtObject->setBody($params['body']);
        // TODO: Пока теги не реализованы, потом раскомментировать
//        $thoughtObject->setTags($params['tags']);

        // Запись его в бд
        $this->entityManager->persist($thoughtObject);
        $this->entityManager->flush();

        return $thoughtObject->getId();
    }

    private function isValid()
    {
        return true;
    }
}