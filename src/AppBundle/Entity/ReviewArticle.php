<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 */
class ReviewArticle extends Article
{
    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", nullable=true)
     * @Serializer\Groups({"comment", "article"})
     */
    private $link;

    /**
     * @param string $link
     * @return ReviewArticle
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }
}