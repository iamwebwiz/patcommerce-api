<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'price' => $faker->randomFloat,
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        },
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
