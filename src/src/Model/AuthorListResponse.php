<?php

namespace App\Model;

class AuthorListResponse
{
    /**
     * @param AuthorListItem[]
     */
    private array $items;

    /**
     * @param AuthorListItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return AuthorListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
