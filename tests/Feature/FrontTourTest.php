<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FrontTourTest extends TestCase
{
    public function test_is_tour_detail_page_working()
    {
        $response = $this->get('/tour_detail/1');
        $response->assertStatus(200);
    }

    public function test_is_tour_reservation_step2_is_working()
    {
        $response = $this->get('/reservation_step2/1/4');
        $response->assertStatus(200);
    }
}
