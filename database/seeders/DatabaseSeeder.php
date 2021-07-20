<?php

// namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
        $faker = Faker::create('id:ID');
        $bureau = ['RnD', 'RnC', 'Advocacy', 'SE', 'Entre', 'HRD', 'BPMTI'];

        for ($i=0; $i < 30; $i++) {
            DB::table('berita_test')->insert([
                'title' => $faker->sentence(),
                'created_at' => $faker->dateTimeThisYear(),
                'bureau' => $bureau[$faker->numberBetween(0,6)]
            ]);
        }
    }
}
