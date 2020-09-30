<?php


namespace App\Service\Thought;


use App\Entity\Thought;
use App\Service\AbstractService;

class DeleteThought extends AbstractService
{

    /**
     * @param array $params [id]
     * @return mixed
     */
    public function execute(array $params)
    {
        $repository = $this->entityManager->getRepository(Thought::class);
        $thought = $repository->findOneBy(['id' => $params['id']]);

        if(!$thought) {
            throw new \Exception('Не найден элемент с таким id');
        }

        $this->entityManager->remove($thought);
        $this->entityManager->flush();

        return true;
    }
}