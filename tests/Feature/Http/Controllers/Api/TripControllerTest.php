<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Trip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\TripController
 */
final class TripControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_responds_with(): void
    {
        $trips = Trip::factory()->count(3)->create();

        $response = $this->get(route('trips.index'));

        $response->assertOk();
        $response->assertJson($trips);
    }


    #[Test]
    public function show_responds_with(): void
    {
        $trip = Trip::factory()->create();
        $trips = Trip::factory()->count(3)->create();

        $response = $this->get(route('trips.show', $trip));

        $response->assertOk();
        $response->assertJson($trips);
    }


    #[Test]
    public function store_saves_and_responds_with(): void
    {
        $response = $this->post(route('trips.store'));

        $response->assertOk();
        $response->assertJson($trip);

        $this->assertDatabaseHas(trips, [ /* ... */ ]);
    }


    #[Test]
    public function update_responds_with(): void
    {
        $trip = Trip::factory()->create();
        $trips = Trip::factory()->count(3)->create();

        $response = $this->put(route('trips.update', $trip));

        $trip->refresh();

        $response->assertOk();
        $response->assertJson($trip);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $trip = Trip::factory()->create();
        $trips = Trip::factory()->count(3)->create();

        $response = $this->delete(route('trips.destroy', $trip));

        $response->assertNoContent();

        $this->assertModelMissing($trip);
    }
}
