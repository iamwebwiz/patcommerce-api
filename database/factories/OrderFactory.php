<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Order;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'identifier' => Str::random(10),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'total_price' => $faker->randomFloat,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
