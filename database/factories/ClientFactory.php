<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'client_name'   => $faker->firstName,
        'email'         => $faker->email,
        'contact_number'=> $faker->e164PhoneNumber,
        'referenced_by' => $faker->firstName,
    ];
});
