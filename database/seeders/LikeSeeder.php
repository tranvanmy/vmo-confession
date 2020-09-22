<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            ['id_user'=>1,
            'value'=>-1,
            'likeable_type'=>'App\Models\Post',
            'likeable_id'=>1],
            ['id_user'=>2,
            'value'=>1,
            'likeable_type'=>'App\Models\Post',
            'likeable_id'=>1],
            ['id_user'=>1,
            'value'=>1,
            'likeable_type'=>'App\Models\Post',
            'likeable_id'=>1],
            ['id_user'=>2,
            'value'=>-1,
            'likeable_type'=>'App\Models\Post',
            'likeable_id'=>1],
            ['id_user'=>3,
            'value'=>-1,
            'likeable_type'=>'App\Models\Post',
            'likeable_id'=>2],
            ['id_user'=>2,
            'value'=>1,
            'likeable_type'=>'App\Models\Post',
            'likeable_id'=>1],
            ['id_user'=>1,
            'value'=>-1,
            'likeable_type'=>'App\Models\Comment',
            'likeable_id'=>1],
            ['id_user'=>2,
            'value'=>1,
            'likeable_type'=>'App\Models\Comment',
            'likeable_id'=>1],
            ['id_user'=>1,
            'value'=>1,
            'likeable_type'=>'App\Models\Comment',
            'likeable_id'=>1],
            ['id_user'=>2,
            'value'=>-1,
            'likeable_type'=>'App\Models\Comment',
            'likeable_id'=>2],
            ['id_user'=>3,
            'value'=>-1,
            'likeable_type'=>'App\Models\Comment',
            'likeable_id'=>2],
            ['id_user'=>2,
            'value'=>1,
            'likeable_type'=>'App\Models\Comment',
            'likeable_id'=>2]
            ]);
    }
}
