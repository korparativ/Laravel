<?php

use App\Models\Hotel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(RefreshDatabase::class);

test('test_hotels_index', function () {
    $response = $this->get('api/hotels');

    $response->assertStatus(200);
});

test('test_hotels_can_be_show', function () {
    $hotel = Hotel::factory()->create();
        $response = $this->get('/api/hotels/' . $hotel->getKey());
        $response->assertStatus(200);
});

test('test_hotels_can_be_created', function () {
    $attributes = [
        'name' => 'Test hotel',
        'address' => 'Test address',
    ];

        $response = $this->post('/api/hotels', $attributes);
        $response->assertStatus(201);
        $this->assertDatabaseHas('hotels', $attributes);
});

test('test_hotels_can_be_updated', function () {
    $hotel = Hotel::factory()->create();
    $attributes = [
        'name' => 'New hotel',
        'address' => 'New address',
    ];

        $response = $this->patch('/api/hotels/' . $hotel->getKey(), $attributes);
        $response->assertStatus(202);
        $this->assertDatabaseHas('hotels', array_merge(['id' => $hotel->getKey()], $attributes
    ));
});

test('test_hotels_can_be_deleted', function () {
    $hotel = Hotel::factory()->create();

        $response = $this->delete('/api/hotels/' . $hotel->getKey());
        $response->assertStatus(204);
        $this->assertDatabaseMissing('hotels', ['id' => $hotel->getKey()]);
});

// class HotelTest extends TestCase{
//     use RefreshDatabase;

//     public function set(){
//         parent::setUp();
//         $this->artisan('db:seed');
//     }

//     // public function test_hotels_index(){
//     //     $response = $this->get('/api/hotels');
//     //     $response->assertStatus(200);
//     // }

//     public function test_hotels_can_be_show(){
//         $hotel = Hotel::factory()->create();
//         $response = $this->get('/api/hotels' . $hotel->getKey());
//         $response->assertStatus(200);
//     }
// }
