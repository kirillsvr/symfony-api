<?php

namespace App\Service;

use App\Entity\Author;
use App\Model\AuthorListItem;
use App\Model\AuthorListResponse;
use App\Repository\AuthorRepository;

class AuthorService
{
    public function __construct(private AuthorRepository $authorRepository)
    {
    }

    public function getAuthors(): AuthorListResponse
    {
        $authors = $this->authorRepository->findAllSortedByName();

        $items = array_map(
            fn(Author $author) => new AuthorListItem(
                $author->getId(), $author->getName(), $author->getSlug()
            ),
            $authors
        );

        return new AuthorListResponse($items);
    }
}
