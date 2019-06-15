<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\OrderItem;
use Faker\Generator as Faker;

$factory->define(OrderItem::class, function (Faker $faker) {
    return [
        'order_id' => function () {
            return factory(App\Order::class)->create()->id;
        },
        'name' => $faker->name,
        'price' => $faker->randomFloat,
        'quantity' => $faker->randomNumber,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
