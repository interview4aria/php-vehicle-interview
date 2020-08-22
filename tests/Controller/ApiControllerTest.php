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

        $this->assertEquals('Al Mirqab', $responseData[0]['name']);
        $this->assertEquals('boat', $responseData[0]['type']);
        $this->assertArrayHasKey('id', $responseData[0]);

        $this->assertEquals('Batmobile', $responseData[1]['name']);
        $this->assertEquals('car', $responseData[1]['type']);
        $this->assertArrayHasKey('id', $responseData[1]);

        $this->assertEquals('Bullitt', $responseData[2]['name']);
        $this->assertEquals('car', $responseData[2]['type']);
        $this->assertArrayHasKey('id', $responseData[2]);

        $this->assertEquals('Dilbar', $responseData[3]['name']);
        $this->assertEquals('boat', $responseData[3]['type']);
        $this->assertArrayHasKey('id', $responseData[3]);

        $this->assertEquals('Enola Gay', $responseData[4]['name']);
        $this->assertEquals('plane', $responseData[4]['type']);
        $this->assertArrayHasKey('id', $responseData[4]);

        $this->assertEquals('Spirit of St. Louis', $responseData[5]['name']);
        $this->assertEquals('plane', $responseData[5]['type']);
        $this->assertArrayHasKey('id', $responseData[5]);

        $this->assertEquals(6, count($responseData));
    }
}