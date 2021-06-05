<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    $arrayValues = ['pending', 'under_working', 'completed'];
    return [
        'client_id'          => factory(App\Models\Client::class)->create()->id,
        'project_name'       => $faker->word,
        'started_date'       => $faker->date($format = 'Y-m-d', $max = 'now'), 
        'delivery_date'      => $faker->date($format = 'Y-m-d', $max = 'now'),
        'budget'             => $faker->numberBetween($min = 1000, $max = 90000),
        'no_of_developers'   => $faker->numberBetween($min = 1, $max = 5),
        'plan_report_url'    => $faker->imageUrl($width = 640, $height = 480),
        'status'             => $arrayValues[rand(0,2)]
    ];
});
