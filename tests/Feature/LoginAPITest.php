<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class LoginAPITest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {

        $user = User::factory()->create(['password' => 'mypassword']);

        $response = $this->post('/api/sanctum/token', [
            'email' => $user->email,
            'password' => 'mypassword',
            'device_name' => 'app'
        ]);

        $response->assertOk();


        $this->assertArrayHasKey('token', $response->json());

        $this->assertArrayHasKey('user', $response->json());

        $this->assertEquals($user->email, $response->json('user.email'));


    }

    public function test_the_token_valid_access_me_route(): void
    {
        $user = User::factory()->create(['password' => 'mypassword']);

        $token = $user->createToken('app')->plainTextToken;

        $response = $this->get('/api/user',
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ]);

        $this->assertEquals($user->name, $response->json('name'));
    }
}
