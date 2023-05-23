<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class genreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genre')->insert(
            [
                'kd_genre'=>'G001',
                'nm_genre'=>'ACTION'
            ]);
            DB::table('genre')->insert([
                'kd_genre'=>'G002',
                'nm_genre'=>'HORROR'
            ]);
            DB::table('genre')->insert([
                'kd_genre'=>'G003',
                'nm_genre'=>'COMEDY'
            ]);
            DB::table('genre')->insert([
                'kd_genre'=>'G004',
                'nm_genre'=>'DRAMA'
            ]);
            DB::table('genre')->insert([
                'kd_genre'=>'G005',
                'nm_genre'=>'THRILLER'
            ]);
            DB::table('genre')->insert([
                'kd_genre'=>'G006',
                'nm_genre'=>'FICTION'
            ]);
        }
}
