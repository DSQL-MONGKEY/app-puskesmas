<?php

namespace Database\Seeders;

use App\Models\Operation;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Operation::create([
            'background_time'=>'Morning',
            'slug'=>'morning',   
            'open_at'=>Carbon::createFromTimeString('05:00:00', 'Asia/Jakarta'),
            'closed_at'=>Carbon::createFromTimeString('9:00:00', 'Asia/Jakarta'),
        ]);
        Operation::create([
            'background_time'=>'Noon',   
            'slug'=>'noon',
            'open_at'=>Carbon::createFromTimeString('10:00:00', 'Asia/Jakarta'),
            'closed_at'=>Carbon::createFromTimeString('13:00:00', 'Asia/Jakarta'),
        ]);
        Operation::create([
            'background_time'=>'Afternoon',   
            'slug'=>'afternoon',  
            'open_at'=>Carbon::createFromTimeString('14:00:00', 'Asia/Jakarta'),
            'closed_at'=>Carbon::createFromTimeString('17:00:00', 'Asia/Jakarta'),
        ]);
    }
}
