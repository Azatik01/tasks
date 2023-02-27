<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_redirect()
    {
        $user = User::factory()->create();
        session()->put("user_id", $user->id);
        $response = $this->actingAs($user)->get('/tasks');
        $response->assertStatus(200);
    }
}
