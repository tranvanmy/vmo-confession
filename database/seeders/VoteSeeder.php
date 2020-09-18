<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votes')->insert([
            ['id_post'=>1, 'point'=>4],
            ['id_post'=>2, 'point'=>5],
            ['id_post'=>3, 'point'=>5],]
        
        );
    }
}
