<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 * @ORM\Table(name="comment")
 */
class Comment
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Groups({"comment", "article"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     * @Serializer\Groups({"comment", "article"})
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Serializer\Groups({"comment", "article"})
     */
    private $content;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Article")
     * @Serializer\Groups({"comment"})
     */
    private $article;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection
     */
    public function getArticle()
    {
        return $this->article;
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $title
     * @return Comment
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param mixed $content
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param mixed $article
     * @return Comment
     */
    public function setArticle($article)
    {
        $this->article = $article;
        return $this;
    }
}