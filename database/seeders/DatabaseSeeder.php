<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $this->call(UsersSeeder::class);
        // factory(App\Models\Transaction::class, 10)->create();
        // \App\Models\Transaction::factory()->count(10)->create(); 
    }
}
