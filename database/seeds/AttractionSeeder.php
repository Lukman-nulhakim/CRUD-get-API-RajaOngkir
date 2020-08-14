<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attractions')->insert([
            'tempat' => 'Pantai Tanjung Pasir',
            'provinsi' => 'Banten',
            'jumlah' => 500
        ]);
        
        DB::table('attractions')->insert([
            'tempat' => 'Gunung Gede',
            'provinsi' => 'Jawa Barat',
            'jumlah' => 1000
        ]);
        
        DB::table('attractions')->insert([
            'tempat' => 'Bromo',
            'provinsi' => 'Sumatera',
            'jumlah' => 2000
        ]);

        DB::table('attractions')->insert([
            'tempat' => 'Borobudur',
            'provinsi' => 'Jawa Tengah',
            'jumlah' => 1500
        ]);
        
        DB::table('attractions')->insert([
            'tempat' => 'Pantai Carita Anyer',
            'provinsi' => 'Banten',
            'jumlah' => 2500
        ]);
       
    }
}
