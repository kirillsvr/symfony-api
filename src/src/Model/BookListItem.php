<?php

namespace App\Model;

use App\Entity\Author;
use Doctrine\Common\Collections\Collection;

class BookListItem
{
    private ?int $id;

    private string $title;

    private string $slug;

    private string $image;

    /**
     * @var Collection<Author>
     */
    private Collection $authors;

    private int $publicationDate;

    private bool $meap;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return Collection<Author>
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    /**
     * @param Collection<Author> $authors
     * @return $this
     */
    public function setAuthors(Collection $authors): self
    {
        $this->authors = $authors;
        return $this;
    }

    public function getPublicationDate(): int
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(int $publicationDate): self
    {
        $this->publicationDate = $publicationDate;
        return $this;
    }

    public function isMeap(): bool
    {
        return $this->meap;
    }

    public function setMeap(bool $meap): self
    {
        $this->meap = $meap;
        return $this;
    }
}