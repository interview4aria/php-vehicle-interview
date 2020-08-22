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

        $this->assertEquals('Air Force One', $responseData[0]['name']);
        $this->assertEquals('Plane', $responseData[0]['type']);
        $this->assertEquals('White', $responseData[0]['color']);
        $this->assertEquals('Air Force One is the official air traffic control call sign for a United States Air Force aircraft carrying the president of the United States. In common parlance, the term is used to denote U.S. Air Force aircraft modified and used to transport the president.[1] The aircraft are prominent symbols of the American presidency and its power.', $responseData[0]['description']);
        $this->assertEquals('3200000000', $responseData[0]['price']);
        $this->assertEquals('Air Force One is the official air traffic control call sign for a United States Air Force aircraf...', $responseData[0]['truncDescription']);
        $this->assertEquals('$3,200,000,000.00', $responseData[0]['formatPrice']);
        $this->assertArrayHasKey('id', $responseData[0]);

        $this->assertEquals('Al Mirqab', $responseData[1]['name']);
        $this->assertEquals('Boat', $responseData[1]['type']);
        $this->assertEquals('Blue', $responseData[1]['color']);
        $this->assertEquals('Al Mirqab is one of the largest motor yachts ever built. The yacht belongs to Qatar\'s former Prime Minister and Foreign Minister Hamad bin Jassim bin Jaber Al Thani. The yacht was built at Peters Schiffbau Wewelsfleth yard in Germany.', $responseData[1]['description']);
        $this->assertEquals('250000000', $responseData[1]['price']);
        $this->assertEquals('Al Mirqab is one of the largest motor yachts ever built. The yacht belongs to Qatar\'s former Prim...', $responseData[1]['truncDescription']);
        $this->assertEquals('$250,000,000.00', $responseData[1]['formatPrice']);
        $this->assertArrayHasKey('id', $responseData[1]);

        $this->assertEquals('Batmobile', $responseData[2]['name']);
        $this->assertEquals('Car', $responseData[2]['type']);
        $this->assertEquals('Black', $responseData[2]['color']);
        $this->assertEquals('The Batmobile is the fictional car driven by the superhero Batman. Housed in the Batcave, which it accesses through a hidden entrance, the Batmobile is both a heavily armored tactical assault vehicle and a personalized custom-built pursuit and capture vehicle that is used by Batman in his fight against crime.', $responseData[2]['description']);
        $this->assertEquals('620000', $responseData[2]['price']);
        $this->assertEquals('The Batmobile is the fictional car driven by the superhero Batman. Housed in the Batcave, which i...', $responseData[2]['truncDescription']);
        $this->assertEquals('$620,000.00', $responseData[2]['formatPrice']);
        $this->assertArrayHasKey('id', $responseData[2]);

        $this->assertEquals('Bullitt', $responseData[3]['name']);
        $this->assertEquals('Car', $responseData[3]['type']);
        $this->assertEquals('Gray', $responseData[3]['color']);
        $this->assertEquals('The 1968 Ford Mustang GT driven by Steve McQueen in the 1968 film "Bullitt" just auctioned off for $3.74 million. It is now considered the most valuable Ford Mustang in the world, according to the auction house that sold the car, Mecum Auctions.', $responseData[3]['description']);
        $this->assertEquals('3700000', $responseData[3]['price']);
        $this->assertEquals('The 1968 Ford Mustang GT driven by Steve McQueen in the 1968 film "Bullitt" just auctioned off fo...', $responseData[3]['truncDescription']);
        $this->assertEquals('$3,700,000.00', $responseData[3]['formatPrice']);
        $this->assertArrayHasKey('id', $responseData[3]);

        $this->assertEquals('Dilbar', $responseData[4]['name']);
        $this->assertEquals('Boat', $responseData[4]['type']);
        $this->assertEquals('White', $responseData[4]['color']);
        $this->assertEquals('Dilbar is a super-yacht launched on 14 November 2015 at the German Lürssen shipyard and delivered in 2016. It was built as Project Omar. The interior design of Dilbar was designed by Andrew Winch and the exterior by Espen Oeino. As of 2020, Dilbar is the sixth longest yacht in the world.', $responseData[4]['description']);
        $this->assertEquals('1000000000', $responseData[4]['price']);
        $this->assertEquals('Dilbar is a super-yacht launched on 14 November 2015 at the German Lürssen shipyard and delivere...', $responseData[4]['truncDescription']);
        $this->assertEquals('$1,000,000,000.00', $responseData[4]['formatPrice']);
        $this->assertArrayHasKey('id', $responseData[4]);

        $this->assertEquals('Enola Gay', $responseData[5]['name']);
        $this->assertEquals('Plane', $responseData[5]['type']);
        $this->assertEquals('Silver', $responseData[5]['color']);
        $this->assertEquals('The Enola Gay is a Boeing B-29 Superfortress bomber, named after Enola Gay Tibbets, the mother of the pilot, Colonel Paul Tibbets. On 6 August 1945, piloted by Tibbets and Robert A. Lewis during the final stages of World War II, it became the first aircraft to drop an atomic bomb.', $responseData[5]['description']);
        $this->assertEquals('1231881', $responseData[5]['price']);
        $this->assertEquals('The Enola Gay is a Boeing B-29 Superfortress bomber, named after Enola Gay Tibbets, the mother of...', $responseData[5]['truncDescription']);
        $this->assertEquals('$1,231,881.00', $responseData[5]['formatPrice']);
        $this->assertArrayHasKey('id', $responseData[5]);

        $this->assertEquals('Spirit of St. Louis', $responseData[6]['name']);
        $this->assertEquals('Plane', $responseData[6]['type']);
        $this->assertEquals('Gray', $responseData[6]['color']);
        $this->assertEquals('Louis is the custom-built, single-engine, single-seat, high-wing monoplane that was flown by Charles Lindbergh on May 20–21, 1927, on the first solo nonstop transatlantic flight from Long Island, New York, to Paris, France, for which Lindbergh won the $25,000 Orteig Prize.', $responseData[6]['description']);
        $this->assertEquals('1383020', $responseData[6]['price']);
        $this->assertEquals('Louis is the custom-built, single-engine, single-seat, high-wing monoplane that was flown by Char...', $responseData[6]['truncDescription']);
        $this->assertEquals('$1,383,020.00', $responseData[6]['formatPrice']);
        $this->assertArrayHasKey('id', $responseData[6]);

        $this->assertEquals(7, count($responseData));
    }
}