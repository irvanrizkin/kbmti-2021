<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BeritaTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
