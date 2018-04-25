<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Date;

class FrontTourTest extends TestCase
{
/*     public function test_is_tour_detail_page_working()
    {
        $date = Date::first();
        $response = $this->get('tour_detail/' . $date->id);
        $response->assertStatus(200);
    } */

    public function test_is_tour_reservation_step2_is_working()
    {
        $response = $this->get('/reservation_step2/1/4');
        $response->assertStatus(200);
    }

    public function test_tour_reservation_information_validation()
    {
        $post_array = array(
            "name" => "Yalın Çobanoğlu",
            "email"  => "yalin@yalin.com",
            "address"  => "Antalya TÜRKİYE",
            "pax_count"  => 1,
            "gender" => [
                'mr'
            ],
            "pax" => [
                "Yalın Cobanoğlu"
            ],
            "date_id" => 3
        );

        $response = $this->json('POST', 'reservation_post', $post_array);
       
        $response->assertStatus(200);
        
    }
}
