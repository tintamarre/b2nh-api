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
    public function randomApiTest()
    {
        // TODO: Should route with route() facade and get random params
        $this->calling('/api/v1/volcano_events');
        $this->calling('/api/v1/volcano_events?page=15');
        $this->calling('/api/v1/volcano_events/18');
        
        $this->calling('/api/v1/volcanoes');
        $this->calling('/api/v1/volcanoes?page=12');
        $this->calling('/api/v1/volcanoes/10102');
        
        $this->calling('/api/v1/tsunami_events');
        $this->calling('/api/v1/tsunami_events?page=14');
        $this->calling('/api/v1/tsunami_events/23');
        
        $this->calling('/api/v1/earthquake_events');
        $this->calling('/api/v1/earthquake_events?page=9');
        $this->calling('/api/v1/earthquake_events/1');
    }

    private function calling($url)
    {
        $response = $this->call('GET', $url);
        $response->assertStatus(200);
        $response->assertSee('data');
    }
}
