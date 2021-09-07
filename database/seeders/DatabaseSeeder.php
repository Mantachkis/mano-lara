<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;  //https://github.com/fzaninotto/Faker

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();


        DB::table('users')->insert([
            'name' => 'Test',
            'email' => 'test@testas.com',
            'password' => Hash::make('12345678'),
        ]);
        $mastersCount = 20;
        foreach (range(1, $mastersCount) as $_) {
            DB::table('masters')->insert([
                'name' => $faker->firstName(),
                'surname' => $faker->LastName(),

            ]);
        }
        $outfits = ['Skirt', 'Dres', 'Gooon', 'Jacket', 'Skirt mini', 'Skirt maxi', 'Skirt midi'];
        foreach (range(1, 200) as $_) {
            DB::table('outfits')->insert([
                'type' => $outfits[rand(0, count($outfits) - 1)],
                'color' => $faker->safeColorName(),
                'size' => rand(5, 22),
                'about' => $faker->paragraph(5),
                'master_id' => rand(1, $mastersCount),
            ]);
        }
    }
}