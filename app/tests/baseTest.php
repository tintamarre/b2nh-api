<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class baseTest extends TestCase
{
    /** @test */
    public function redirectionTest()
    {
        $response = $this->call('GET', '/');
        $response->assertStatus(302);
    }

    /** @test */
    public function baseApiTest()
    {
        $response = $this->call('GET', '/api/v1/');
        $response->assertStatus(200);
        $response->assertSee(env('APP_NAME'));
    }

    /** @test */
    public function earthquakesApiTest()
    {
        // TODO: Should route with route() facade and get random params
        $this->calling('/api/v1/earthquake_events');
    }

    public function tsunamisApiTest()
    {
        // TODO: Should route with route() facade and get random params
        $this->calling('/api/v1/tsunami_events');
    }

    public function volcanoesApiTest()
    {
        // TODO: Should route with route() facade and get random params
        $this->calling('/api/v1/volcanoes');
    }

    /** @test */
    public function volcanoeEventApiTest()
    {
        // TODO: Should route with route() facade and get random params
        $this->calling('/api/v1/volcano_events');
    }
    
    private function calling($url)
    {
        $response = $this->call('GET', $url);
        $response->assertStatus(200);
        $response->assertSee('data');
    }
}
