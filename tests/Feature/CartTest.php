<?php

namespace Tests\Feature;

use App\Cart;
use App\Product;
use Tests\TestCase;

class CartTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_fetch_cart_items()
    {
        $carts = $this->user->carts()->saveMany(factory(Cart::class, 5)->create());

        $this->actingAs($this->user, 'api')->json('GET', '/api/cart')
            ->assertOk()
            ->assertSee('data');
    }

    /**
     * @test
     */
    public function it_can_add_item_to_cart()
    {
        $data = [
            'price' => $this->faker->randomFloat,
            'quantity' => $this->faker->randomNumber,
            'product_id' => factory(Product::class)->create()->id,
        ];

        $this->actingAs($this->user, 'api')
            ->json('POST', '/api/cart/add', $data)
            ->assertStatus(201)
            ->assertSee('data');

        $this->assertDatabaseHas('carts', collect($data)->toArray());
    }

    /**
     * @test
     */
    public function it_can_remove_item_from_cart()
    {
        $cart = factory(Cart::class)->create();

        $this->actingAs($this->user, 'api')
            ->json('DELETE', '/api/cart/' . $cart->id)
            ->assertJson(['status' => 'success']);
    }

    /**
     * @test
     */
    public function it_can_flush_cart()
    {
        $cart = factory(Cart::class, 5)->create();

        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/cart/flush')
            ->assertStatus(200)
            ->assertJson(['status' => 'success']);
    }
}
