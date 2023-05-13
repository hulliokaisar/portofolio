<?php

namespace Database\Seeders;

use App\Models\Members;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
     
        for ($i=0; $i <20; $i++){
            $members = new Members;

            $members->name = $faker->name;
            $members->gender = $faker->randomElement(['L', 'P']);
            $members->phone_number = '08' .$faker->randomNumber(8);
            $members->address = $faker->address;
            $members->email = $faker->email;
            
            $members->save();
        }
    }
}
