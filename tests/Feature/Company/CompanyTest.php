<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class CompanyTest extends TestCase
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
    public function user_try_get_all_companys()
    {
        $response = $this->client->get('/api/company');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response);
    }

    /** @test */
    public function user_try_create_a_company()
    {
        $data = [
            "name" => "Two Brothers One Cup LTDA",
            "doc" => "twobrothers@gmail.com",
            "address" => "Rua Margarida azevedo, 74, General Ozorio, Fortaleza - CE"
        ];

        $response = $this->client->post('/api/company', ["json" => $data]);

        $body = json_decode($response->getBody()->getContents());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('Compania criada com sucesso :)', $body->message);
    }

    /** @test */
    public function user_try_update_a_company()
    {
        $data = [
            "name" => "Two Brothers One Cup LTDA",
            "doc" => "twobrothers@gmail.com",
            "address" => "Rua Margarida azevedo, 74, General Ozorio, Fortaleza - CE"
        ];

        $response = $this->client->post('/api/company',  ["json" => $data]);
        $body = json_decode($response->getBody()->getContents());

        $user = array_shift($body->data);

        $data = [
            "uuid" =>  $user->uuid,
            "name" => "Two Brothers Avengers"
        ];

        $response = $this->client->put('/api/company',  ["json" => $data]);
        $body = json_decode($response->getBody()->getContents());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('Compania atualizada :)', $body->message);
    }

    /** @test */
    public function user_try_delete_a_company()
    {
        $response = $this->client->get('/api/company');
        $this->assertEquals(200, $response->getStatusCode());

        $company = end(json_decode($response->getBody()->getContents())->data);
        
        $data = [
            "uuid" => $company->uuid
        ];

        $response = $this->client->delete("/api/company", ["json" => $data]);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
