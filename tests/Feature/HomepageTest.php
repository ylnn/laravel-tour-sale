<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomepageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomepage()
    {
        $response = $this->get('/');
        $selam = "selamlar";
        $response->assertStatus(200);
        $response->assertSee('TourSale');
    }

    public function testTourpage()
    {
        $response = $this->get('/tour/1');
        $response->assertStatus(200);
    }

    public function testReservationStep2()
    {
        $response = $this->get('/reservation_step2/1/4');
        $response->assertStatus(200);
    }
}
