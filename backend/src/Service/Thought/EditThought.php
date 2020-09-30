<?php


namespace App\Service\Thought;


use App\Service\AbstractService;
use App\Entity\Thought;

class EditThought extends AbstractService
{

    /**
     * @param array $params новые поля изменяемой записи(поиск записи по полю id)
     * @return bool
     * @throws \Exception
     */
    public function execute(array $params)
    {
        $repository = $this->entityManager->getRepository(Thought::class);
        /** @var Thought $thought */
        $thought = $repository->findOneBy(['id' => $params['id']]);

        if(!$thought) {
            throw new \Exception('Не найдена запись с заданным id =' . $params['id']);
        }

        $thought->setPropsByArray($params);
        $this->entityManager->flush();

        return true;
    }
}