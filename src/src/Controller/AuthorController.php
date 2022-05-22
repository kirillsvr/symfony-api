<?php

namespace App\Controller;

use App\Service\AuthorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    public function __construct(private AuthorService $authorService)
    {
    }

    #[Route(path: '/api/v1/authors', methods: ['GET'])]
    public function authors(): Response
    {
        return $this->json($this->authorService->getAuthors());
    }
}
