<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class produserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produser')->insert(
            [
                'kd_produser'=>'PD01',
                'nm_produser'=>'MARVEL',
                'international'=>'YA'
            ]);
            DB::table('produser')->insert([
                'kd_produser'=>'PD02',
                'nm_produser'=>'HONGKONG CINEMA',
                'international'=>'YA'
            ]);
            DB::table('produser')->insert([
                'kd_produser'=>'PD03',
                'nm_produser'=>'RAPI FILM',
                'international'=>'TIDAK'
            ]);
            DB::table('produser')->insert([
                'kd_produser'=>'PD04',
                'nm_produser'=>'PARKIT',
                'international'=>'TIDAK'
            ]);
            DB::table('produser')->insert([
                'kd_produser'=>'PD05',
                'nm_produser'=>'PARAMOUNT PICTURE',
                'international'=>'YA'
            ]);
    }
}
