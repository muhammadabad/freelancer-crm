<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'project_id'        => factory(App\Models\Project::class)->create()->id,
        'amount'            => $faker->numberBetween($min = 1000, $max = 90000),
        'transaction_mode'  =>  $faker->word,
        'transaction_note'  =>  $faker->word,
        'payment_date'      =>   $faker->date($format = 'Y-m-d', $max = 'now'),
        'payment_date'      =>   $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
