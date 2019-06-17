<?php

namespace Tests\Feature;

use App\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_fetch_categories()
    {
        $this->json('GET', '/api/categories')->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_can_create_category()
    {
        $data = [
            'name' => $this->faker->unique()->name,
            'description' => $this->faker->sentence,
        ];

        $this->json('POST', '/api/categories', $data)
            ->assertStatus(201)
            ->assertSee('data');
    }

    /**
     * @test
     */
    public function it_can_show_a_category()
    {
        $category = factory(Category::class)->make();

        $this->json('GET', "/api/categories/$category->id")
            ->assertStatus(200)
            ->assertSee('data');
    }

    /**
     * @test
     */
    public function it_can_update_a_category()
    {
        $category = factory(Category::class)->create();

        $this->json('PATCH', "/api/categories/$category->id", ['name' => $this->faker->name])
            ->assertSee('data');
    }

    /**
     * @test
     */
    public function it_can_delete_a_category()
    {
        $category = factory(Category::class)->create();

        $this->json('DELETE', "/api/categories/$category->id")
            ->assertStatus(204)
            ->assertSuccessful();
    }
}
