<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UiiControllerTest extends WebTestCase
{
    public function testVechiles()
    {
        $client = static::createClient();

        $client->request('GET', '/');
        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }
}