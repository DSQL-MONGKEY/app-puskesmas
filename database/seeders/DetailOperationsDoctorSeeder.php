<?php

namespace Database\Seeders;

use App\Models\DetailOperationsDoctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailOperationsDoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DetailOperationsDoctor::create([
            'doctor_id'=>1,
            'operation_id'=>1
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>1,
            'operation_id'=>2
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>2,
            'operation_id'=>1
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>2,
            'operation_id'=>2
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>2,
            'operation_id'=>3
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>3,
            'operation_id'=>1
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>4,
            'operation_id'=>1
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>4,
            'operation_id'=>2
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>5,
            'operation_id'=>2
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>6,
            'operation_id'=>3
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>7,
            'operation_id'=>1
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>7,
            'operation_id'=>2
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>8,
            'operation_id'=>2
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>8,
            'operation_id'=>3
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>9,
            'operation_id'=>2
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>10,
            'operation_id'=>1
        ]);
        DetailOperationsDoctor::create([
            'doctor_id'=>10,
            'operation_id'=>2
        ]);
    }
}
