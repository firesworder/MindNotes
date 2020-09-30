<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

// TODO: добавить в сеттеры - возвращение самого себя(объекта) для возможности формирования цепочек вызовов

/**
 * @ORM\Entity(repositoryClass="App\Repository\Thought")
 * @ORM\Table(name="thoughts")
 */
class Thought
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column (type="boolean")
     * @var bool
     */
    private $isProcessed;

    /**
     * @ORM\Column (type="string")
     * @var string
     */
    private $title;

    /**
     * @ORM\Column (type="text")
     * @var string
     */
    private $body;

    /**
     * @ORM\ManyToMany(targetEntity="Tag")
     * @var ArrayCollection
     */
    private $tags;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isProcessed()
    {
        return $this->isProcessed;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param bool $isProcessed
     */
    public function setIsProcessed($isProcessed)
    {
        $this->isProcessed = $isProcessed;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @param ArrayCollection $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * Устанавливает значения для соотв-их свойств сущности
     * @param array $params [title, body, isProcessed, //tags]
     */
    public function setPropsByArray(array $params)
    {
        $this->isProcessed = $params['isProcessed'] ?? $this->isProcessed;
        $this->title = $params['title'] ?? $this->title;
        $this->body = $params['body'] ?? $this->body;
        // TODO: по реализации тегов - раскомментировать(ну или удалить)
//        $this->tags = $params['tags'] ?? $this->tags;
    }

    /**
     * Возвращает массив со всеми (публичными) свойствами сущности
     * @return array [id,title, body, isProcessed, //tags]
     */
    public function getPropsByArray()
    {
        return [
            'id' => $this->id,
            'isProcessed' => $this->isProcessed,
            'title' => $this->title,
            'body' => $this->body,
            // TODO: по реализации тегов - раскомментировать(ну или удалить)
            'tags' => [],
//            'tags' => $this->tags,
        ];
    }
}