<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['title'=>'Lặt vặt'],
            ['title'=>'Lương lậu'],
            ['title'=>'Nói xấu xếp'],
            ['title'=>'Điều hòa']]
        );
    }
}
