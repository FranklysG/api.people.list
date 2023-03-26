<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class PeopleTest extends TestCase
{
    private $client;

    protected function setUp(): void
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost',
            'http_errors' => false
        ]);
    }


    /** @test */
    public function user_try_get_all_users()
    {
        $response = $this->client->get('/api/users');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response);
    }

    /** @test */
    public function user_try_create_a_user()
    {
        $data = [
            "name" => "Oliveira Antunes Almeida",
            "email" => "j.antunes@gmail.com",
            "phone" => "99984657328",
            "date_born" => "28/02/1999",
            "city_born" => "Londrina - PA"
        ];

        $response = $this->client->post('/api/users', ["json" => $data]);

        $body = json_decode($response->getBody()->getContents());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('People created with success', $body->message);
    }

    /** @test */
    public function user_try_update_a_user()
    {
        $data = [
            "name" => "Oliveira Antunes Almeida",
            "email" => "j.antunes@gmail.com",
            "phone" => "99984657328",
            "date_born" => "28/02/1999",
            "city_born" => "Londrina - PA"
        ];

        $response = $this->client->post('/api/users',  ["json" => $data]);
        $body = json_decode($response->getBody()->getContents());

        $user = array_shift($body->data);

        $data = [
            "uuid" =>  $user->uuid,
            "name" => "Oliveira Updated Almeida"
        ];

        $response = $this->client->put('/api/users',  ["json" => $data]);
        $body = json_decode($response->getBody()->getContents());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('People updated with success', $body->message);
    }

    /** @test */
    public function user_try_delete_a_user()
    {
        $response = $this->client->get('/api/users');
        $this->assertEquals(200, $response->getStatusCode());

        $people = json_decode($response->getBody()->getContents())->data[3];
        
        $data = [
            "uuid" => $people->uuid
        ];

        $response = $this->client->delete("/api/users", ["json" => $data]);
        $body = json_decode($response->getBody()->getContents());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('People has been deleted', $body->message);

    }
}
