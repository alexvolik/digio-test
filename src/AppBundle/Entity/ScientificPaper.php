<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 */
class ScientificPaper extends Article
{
    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", nullable=true)
     * @Serializer\Groups({"comment", "article"})
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="institution", type="string", nullable=true)
     * @Serializer\Groups({"comment", "article"})
     */
    private $institution;

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return ScientificPaper
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * @param string $institution
     * @return ScientificPaper
     */
    public function setInstitution($institution)
    {
        $this->institution = $institution;
        return $this;
    }
}