<?php

namespace Tests\Feature;

use App\Category;
use App\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_fetch_products()
    {
        $products = factory(Product::class, 5)->make();

        $this->json('GET', '/api/products')->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_can_add_a_product()
    {
        $data = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat,
            'category_id' => factory(Category::class)->create()->id,
        ];

        $this->json('POST', '/api/products', $data)
            ->assertStatus(201)
            ->assertSee('data');

        $this->assertDatabaseHas('products', collect($data)->toArray());
    }

    /**
     * @test
     */
    public function it_can_show_a_product()
    {
        $product = factory(Product::class)->create();

        $response = $this->json('GET', "/api/products/$product->id")
            ->assertStatus(200)
            ->assertOk()
            ->assertSee('data');
    }

    /**
     * @test
     */
    public function it_can_update_a_product()
    {
        $product = factory(Product::class)->create();

        $this->json('PATCH', "/api/products/$product->id", ['name' => $this->faker->name])
            ->assertOk()
            ->assertSee('data');
    }

    /**
     * @test
     */
    public function it_can_delete_a_product()
    {
        $product = factory(Product::class)->create();

        $this->json('DELETE', "/api/products/$product->id")
            ->assertStatus(204)
            ->assertSuccessful();
    }
}
