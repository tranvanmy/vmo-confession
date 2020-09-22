<?php

namespace Database\Seeders;


use DateTime;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([


            ['name'=>'vinh xinh gái',
            'email'=>'vinh@vmo.vn',
            'password'=>bcrypt('123456')],
            ['name'=>'vinh ngu',
            'email'=>'vinhngu@vmo.vn',
            'password'=>bcrypt('123456')],
            ['name'=>'To Toan',
            'email'=>'totoan@vmo.vn',
            'password'=>bcrypt('123456')],
            ['name'=>'To Tien Toan',
            'email'=>'to@vmo.vn',
            'password'=>bcrypt('123456')],
          ['id'=>1,

        	'name'=>'Hoàng Sơn',
        	'email'=>'sonh62@vmo.vn',
            'password'=>bcrypt('hoangson1997'),
        	'created_at'=>new DateTime(),
        ],
            [
        	'name'=>'Tô Tiến Toàn',
        	'email'=>'toanto@vmo.vn',
            'password'=>bcrypt('123456'),
        	'created_at'=>new DateTime(),
        ],
         	[
        	'name'=>'Ngô Thế Vinh',
        	'email'=>'vinhngo@vmo.vn',
            'password'=>bcrypt('123456'),
        	'created_at'=>new DateTime(),
        ],
          
        ]);

    }
}
