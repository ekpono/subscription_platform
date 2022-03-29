<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use App\Models\Website;
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
         Website::factory(10)->create();
         Subscriber::factory(100)->create();
    }
}
