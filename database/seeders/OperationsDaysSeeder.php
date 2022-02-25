<?php

namespace Database\Seeders;

use App\Models\OperationsDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperationsDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        OperationsDay::create([
            'day'=>'Monday',
            'slug'=>'monday'
        ]);
        OperationsDay::create([
            'day'=>'Tuesday',
            'slug'=>'tuesday'
        ]);
        OperationsDay::create([
            'day'=>'Wednesday',
            'slug'=>'wednesday'
        ]);
        OperationsDay::create([
            'day'=>'Thursday',
            'slug'=>'thursday'
        ]);
        OperationsDay::create([
            'day'=>'Friday',
            'slug'=>'friday'
        ]);
    }
}
