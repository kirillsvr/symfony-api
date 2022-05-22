<?php

namespace App\Tests\Service;

use App\Entity\Author;
use App\Model\AuthorListItem;
use App\Model\AuthorListResponse;
use App\Repository\AuthorRepository;
use App\Service\AuthorService;
use App\Tests\AbstractTestCase;

class AuthorServiceTest extends AbstractTestCase
{
    public function testGetAuthors()
    {
        $author = (new Author())->setName('Test')->setSlug('test');
        $this->setEntityId($author, 5);
        
        $repositoryAuthor = $this->createMock(AuthorRepository::class);
        $repositoryAuthor->expects($this->once())
            ->method('findAllSortedByName')
            ->willReturn([$author]);
        
        $service = new AuthorService($repositoryAuthor);
        $expected = new AuthorListResponse([new AuthorListItem(5, 'Test', 'test')]);
        
        $this->assertEquals($expected, $service->getAuthors());
    }
}
