<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            ['id_post'=>1,
            'body'=>' Mình cũng thích tiền nong sòng phẳng nhất là ny. Vậy mà đến giờ vẫn ế',
            ],
            ['id_post'=>1,
            'body'=>'me too',
            ],
            ['id_post'=>1,
            'body'=>' Mình trước còn toàn tự trả tiền :)) thế mà vẫn bị cắm sừng hâhhahah
            Khuyên chị em cứ để trai trả nhé :))) Có khi nhõng nhẽo nó lại yêu mà nghĩ cho nó nó lại cắm sừng haha',
            ],
            ['id_post'=>2,
            'body'=>'Ơ thế vẫn chưa sáng mắt ra à. Hay là em cần vitamin A để cho mình sáng mắt raaa',
            ],
            ['id_post'=>2,
            'body'=>'6 rưỡi chiều chưa biết ai giàu hơn ai =))) bạn nam said',
            ],
            ['id_post'=>2,
            'body'=>'6 rưỡi chiều chưa biết ai giàu hơn ai =))) bạn nam said'
            
            ],
            ]);
            
    }
}
