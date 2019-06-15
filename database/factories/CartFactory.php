<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Cart;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'price' => $faker->randomFloat,
        'quantity' => $faker->randomNumber,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'product_id' => function () {
            return factory(App\Product::class)->create()->id;
        },
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
