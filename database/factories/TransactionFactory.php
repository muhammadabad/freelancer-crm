<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Models\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'project_id'        => \App\Models\Project::factory()->create()->id,
        'amount'            => $this->$faker->numberBetween($min = 1000, $max = 90000),
        'transaction_mode'  =>  $this->$faker->word,
        'transaction_note'  =>  $this->$faker->word,
        'payment_date'      =>   $this->$faker->date($format = 'Y-m-d', $max = 'now'),
        'payment_date'      =>   $this->$faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
