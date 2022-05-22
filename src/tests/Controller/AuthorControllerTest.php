<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthorControllerTest extends WebTestCase
{
    public function testAuthors()
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/authors');

        $responseContent = $client->getResponse()->getContent();

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonFile(
            __DIR__.'/responses/AuthorControllerTest_testAuthors.json',
            $responseContent
        );
    }
}
