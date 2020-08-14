<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 50; $i++){
            DB::table('karyawan')->insert([
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'jabatan' => $faker->jobTitle
            ]);
        }

    }
}
