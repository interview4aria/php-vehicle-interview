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
        $this->assertEquals('blue', $responseData[0]['color']);
        $this->assertEquals('Al Mirqab is one of the largest motor yachts ever built. The yacht belongs to Qatar\'s former Prime Minister and Foreign Minister Hamad bin Jassim bin Jaber Al Thani. The yacht was built at Peters Schiffbau Wewelsfleth yard in Germany.', $responseData[0]['description']);
        $this->assertEquals('250000000', $responseData[0]['price']);
        $this->assertArrayHasKey('id', $responseData[0]);

        $this->assertEquals('Batmobile', $responseData[1]['name']);
        $this->assertEquals('car', $responseData[1]['type']);
        $this->assertEquals('black', $responseData[1]['color']);
        $this->assertEquals('The Batmobile is the fictional car driven by the superhero Batman. Housed in the Batcave, which it accesses through a hidden entrance, the Batmobile is both a heavily armored tactical assault vehicle and a personalized custom-built pursuit and capture vehicle that is used by Batman in his fight against crime.', $responseData[1]['description']);
        $this->assertEquals('620000', $responseData[1]['price']);
        $this->assertArrayHasKey('id', $responseData[1]);

        $this->assertEquals('Bullitt', $responseData[2]['name']);
        $this->assertEquals('car', $responseData[2]['type']);
        $this->assertEquals('gray', $responseData[2]['color']);
        $this->assertEquals('The 1968 Ford Mustang GT driven by Steve McQueen in the 1968 film "Bullitt" just auctioned off for $3.74 million. It is now considered the most valuable Ford Mustang in the world, according to the auction house that sold the car, Mecum Auctions.', $responseData[2]['description']);
        $this->assertEquals('3700000', $responseData[2]['price']);
        $this->assertArrayHasKey('id', $responseData[2]);

        $this->assertEquals('Dilbar', $responseData[3]['name']);
        $this->assertEquals('boat', $responseData[3]['type']);
        $this->assertEquals('white', $responseData[3]['color']);
        $this->assertEquals('Dilbar is a super-yacht launched on 14 November 2015 at the German Lürssen shipyard and delivered in 2016. It was built as Project Omar. The interior design of Dilbar was designed by Andrew Winch and the exterior by Espen Oeino. As of 2020, Dilbar is the sixth longest yacht in the world.', $responseData[3]['description']);
        $this->assertEquals('1000000000', $responseData[3]['price']);
        $this->assertArrayHasKey('id', $responseData[3]);

        $this->assertEquals('Enola Gay', $responseData[4]['name']);
        $this->assertEquals('plane', $responseData[4]['type']);
        $this->assertEquals('silver', $responseData[4]['color']);
        $this->assertEquals('The Enola Gay is a Boeing B-29 Superfortress bomber, named after Enola Gay Tibbets, the mother of the pilot, Colonel Paul Tibbets. On 6 August 1945, piloted by Tibbets and Robert A. Lewis during the final stages of World War II, it became the first aircraft to drop an atomic bomb.', $responseData[4]['description']);
        $this->assertEquals('1231881', $responseData[4]['price']);
        $this->assertArrayHasKey('id', $responseData[4]);

        $this->assertEquals('Spirit of St. Louis', $responseData[5]['name']);
        $this->assertEquals('plane', $responseData[5]['type']);
        $this->assertEquals('gray', $responseData[5]['color']);
        $this->assertEquals('Louis is the custom-built, single-engine, single-seat, high-wing monoplane that was flown by Charles Lindbergh on May 20–21, 1927, on the first solo nonstop transatlantic flight from Long Island, New York, to Paris, France, for which Lindbergh won the $25,000 Orteig Prize.', $responseData[5]['description']);
        $this->assertEquals('1383020', $responseData[5]['price']);
        $this->assertArrayHasKey('id', $responseData[5]);

        $this->assertEquals(6, count($responseData));
    }
}