<?php

namespace Database\Seeders;

use App\Models\Polies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Polies::create([
            'name'=>'Poly Anak',
            'slug'=>'poly-anak',
            'image'=>''
        ]);
        Polies::create([
            'name'=>'Poly Umum',
            'slug'=>'poly-umum',
            'image'=>''
        ]);
        Polies::create([
            'name'=>'Poly Gigi',
            'slug'=>'poly-gigi',
            'image'=>''
        ]);
        Polies::create([
            'name'=>'Poly Tht',
            'slug'=>'poly-tht',
            'image'=>''
        ]);
        Polies::create([
            'name'=>'Poly Lansia',
            'slug'=>'poly-lansia',
            'image'=>''
        ]);
    }
}
