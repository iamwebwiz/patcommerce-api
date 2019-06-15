<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserAuthTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_create_a_user()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'secret',
        ];

        $response = $this->json('POST', '/api/register', $data);

        $response->assertSee('token')->assertStatus(201);

        $this->assertDatabaseHas('users', collect($data)->only(['email', 'name'])->toArray());
    }

    /**
     * @test
     */
    public function it_can_log_user_in()
    {
        $data = ['email' => $this->user->email, 'password' => 'secret'];

        $response = $this->json('POST', '/api/login', $data);

        $response->assertSee('token')->assertStatus(200);
    }
}
