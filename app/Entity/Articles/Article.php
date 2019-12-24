<?php
namespace App\Entity;


/**
 * Class Article
 * @package App\Entity
*/
class Article
{
    /** @var int */
    private $id;

    /** @var string */
    private $title;

    /** @var string */
    private $content;

    /** @var \DateTime */
    private $publishedAt;

    /** @var boolean */
    private $isPublished;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
   /*
    public function setId($id)
    {
        $this->id = $id;
    }
    */

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
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Article
   */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    /**
     * @param \DateTime $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @return bool
    */
    public function isPublished(): ?bool
    {
        return $this->isPublished;
    }

    /**
     * @param bool $isPublished
     * @return Article
    */
    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;
        return $this;
    }

}