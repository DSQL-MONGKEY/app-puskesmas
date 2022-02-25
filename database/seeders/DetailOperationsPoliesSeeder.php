<?php

namespace Database\Seeders;

use App\Models\DetailOperationsPoly;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailOperationsPoliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DetailOperationsPoly::create([
            'polies_id'=>1,
            'operations_day_id'=>1,
        ]);
        DetailOperationsPoly::create([
            'polies_id'=>1,
            'operations_day_id'=>2,
        ]);
        //Umum
        DetailOperationsPoly::create([
            'polies_id'=>2,
            'operations_day_id'=>1,
        ]);
        DetailOperationsPoly::create([
            'polies_id'=>1,
            'operations_day_id'=>2,
        ]);
        DetailOperationsPoly::create([
            'polies_id'=>1,
            'operations_day_id'=>3,
        ]);
        DetailOperationsPoly::create([
            'polies_id'=>1,
            'operations_day_id'=>4,
        ]);
        //Gigi
        DetailOperationsPoly::create([
            'polies_id'=>3,
            'operations_day_id'=>2,
        ]);
        DetailOperationsPoly::create([
            'polies_id'=>3,
            'operations_day_id'=>3,
        ]);
        DetailOperationsPoly::create([
            'polies_id'=>3,
            'operations_day_id'=>4,
        ]);
        //Tht
        DetailOperationsPoly::create([
            'polies_id'=>4,
            'operations_day_id'=>4,
        ]);
        //Lansia
        DetailOperationsPoly::create([
            'polies_id'=>5,
            'operations_day_id'=>2,
        ]);
        DetailOperationsPoly::create([
            'polies_id'=>5,
            'operations_day_id'=>4,
        ]);
    }
}
