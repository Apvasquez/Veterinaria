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
       
        
        $this->call(RoleSeeder::class);


    }
}
