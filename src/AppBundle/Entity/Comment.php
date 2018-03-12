<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 * @ORM\Table(name="comment")
 */
class Comment
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Serializer\Groups({"api"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @Serializer\Groups({"api"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     *
     * @Serializer\Groups({"api"})
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Article")
     *
     * @Serializer\Groups({"api"})
     */
    private $article;

    public function getId()
    {
        return $this->id;
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

}