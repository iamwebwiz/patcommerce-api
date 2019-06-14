<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserAuthTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_register_user()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'secret',
        ];

        $response = $this->json('POST', '/api/register', $data);

        $response->assertSuccessful();
    }
}
