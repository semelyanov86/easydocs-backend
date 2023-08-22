<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_returns_correct_user_in_my_endpoint(): void
    {
        $user = User::factory()->createOne();
        Sanctum::actingAs(
            $user,
            ['view-documents']
        );
        $response = $this->get(route('user.me'));

        $response->assertOk();
        $response->assertJsonFragment(['name' => $user->name, 'id' => $user->id]);
    }
}
