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
        $response->assertSee('b2nh_api');
    }
}
