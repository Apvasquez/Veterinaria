<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Campus;

use App\Models\Bar;






class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Campus::factory(10)->create();
        \App\Models\Bar::factory(10)->create();


    }
}
