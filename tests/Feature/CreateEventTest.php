<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateEventTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
