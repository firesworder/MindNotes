<?php


namespace App\Service\Thought;


use App\Entity\Thought;
use App\Service\AbstractService;

class GetThoughtList extends AbstractService
{
    /**
     * Возвращает список мыслей
     * @param array $params параметры вызова, по умолчанию []
     * @return array Список мыслей [id,title,body,tags]
     */
    public function execute(array $params = [])
    {
        $result = [];
        $repository = $this->entityManager->getRepository(Thought::class);
        $thoughtList = $repository->findAll();

        /** @var Thought $thought */
        foreach ($thoughtList as $thought) {
            $result[] = [
                'id' => $thought->getId(),
                'isProcessed' => $thought->isProcessed(),
                'title' => $thought->getTitle(),
                'body' => $thought->getBody(),
                'tags' => [],
                // TODO: Пока теги не реализованы - закомментировал
//                'tags' => $thought->getTags(),
            ];
        }

        return $result;
    }
}