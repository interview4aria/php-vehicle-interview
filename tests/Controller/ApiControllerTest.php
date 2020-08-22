<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testVechiles()
    {
        $client = static::createClient();

        $client->request('GET', '/api/vehicles');
        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());

        $responseData = json_decode($response->getContent(), true);

        $this->assertEquals([], $responseData);
    }
}