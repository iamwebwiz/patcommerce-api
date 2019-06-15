<?php

namespace Tests\Feature;

use App\Cart;
use App\Order;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_fetch_orders()
    {
        $orders = $this->user->orders()->saveMany(factory(Order::class, 5)->create());

        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/orders')
            ->assertStatus(200)
            ->assertSee('data');
    }

    /**
     * @test
     */
    public function it_can_store_new_order()
    {
        $carts = $this->user->carts()->saveMany(factory(Cart::class, 3)->create());

        $this->actingAs($this->user, 'api')
            ->json('POST', '/api/orders/new')
            ->assertStatus(302)
            ->assertRedirect('/api/cart/flush');
    }

    /**
     * @test
     */
    public function it_can_delete_an_order()
    {
        $order = factory(Order::class)->create();

        $this->actingAs($this->user, 'api')
            ->json('DELETE', '/api/orders/' . $order->id)
            ->assertStatus(204);
    }
}
