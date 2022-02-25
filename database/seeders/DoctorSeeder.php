<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Polies;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $polies = Polies::all();
        for($i = 1; $i <= 10; $i++){
            $faker = Factory::create('id_ID');
            $gender = $faker->randomElement(['male','female']);
            $username = $faker->userName();
            $polyId = $faker->randomElement($polies->pluck('id')->toArray());
            Doctor::create([
                'name'=>$faker->name(),
                'username'=>$username,
                'nip'=>$faker->numerify('###############'),
                'gender'=>$gender,
                'email'=>$username.'@gmail.com',
                'password'=>Hash::make('password'),
                'polies_id'=>$polyId
            ]);
        }
    }
}
