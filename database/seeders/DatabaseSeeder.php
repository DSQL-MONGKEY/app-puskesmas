<?php

namespace Database\Seeders;

use App\Models\Polies;
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
        // \App\Models\User::factory(10)->create();
        $this->call(PoliesSeeder::class);
        $this->call(OperationsSeeder::class);
        $this->call(OperationsDaysSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(DetailOperationsDoctorSeeder::class);
        $this->call(DetailOperationsPoliesSeeder::class);
    }
}
