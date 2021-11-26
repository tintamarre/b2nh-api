<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

use App\Models\VolcanoEvent;
use App\Models\EarthquakeEvent;
use App\Models\TsunamiEvent;

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

    /** @test */
    public function randomEventApiTest()
    {
        for ($i = 0; $i < 100; $i++) {
            $url = $this->getRandomEventUrl();
    
            echo $url . "\r\n";
            $this->calling($url);
        }
    }
    
    private function calling($url)
    {
        $response = $this->call('GET', $url);
        $response->assertStatus(200);
        $response->assertSee('data');
    }

    private function getRandomEventUrl()
    {
        $types = ['earthquake', 'tsunami', 'irruption'];
        $type = $types[array_rand($types)];

        switch ($type) {
            case 'irruption':
                $event_id = VolcanoEvent::inRandomOrder()->first()->id;
                break;
            case 'earthquake':
                $event_id = EarthquakeEvent::inRandomOrder()->first()->id;
                break;
            case 'tsunami':
                $event_id = TsunamiEvent::inRandomOrder()->first()->id;
                break;
            default:
                return response()->json(['error' => 'Invalid event type'], 400);
        }
        $url = route('api.events.show', ['type' => $type, 'event_id' => $event_id]);
        return $url;
    }
}
