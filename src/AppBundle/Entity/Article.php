<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;


/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string", length=30)
 * @ORM\DiscriminatorMap({
 *          "scientific_paper" = "ScientificPaper",
 *          "review" = "ReviewArticle"
 * })
 * @Serializer\Discriminator(field = "type", disabled = false, map = {
 *          "scientific_paper" = "AppBundle\Entity\ScientificPaper",
 *          "review" = "AppBundle\Entity\ReviewArticle"
 * }, groups={"comment", "article"})
 * @ORM\Table(name="article")
 */
abstract class Article
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Comment", mappedBy="article")
     * @Serializer\Groups({"article"})
     */
    private $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param ArrayCollection $comments
     * @return Article
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }
    
}