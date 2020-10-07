<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
            ['name'=>'edit your profile',
             'guard_name'=>'web',
            ],['name'=>'comment posts',
             'guard_name'=>'web',
            ],['name'=>'like posts',
            'guard_name'=>'web',
            ],['name'=>'reply comments',
            'guard_name'=>'web',
            ],['name'=>'create posts',
            'guard_name'=>'web',
            ],['name'=>'search posts',
            'guard_name'=>'web',
            ],['name'=>'rate posts',
            'guard_name'=>'web',
            ],['name'=>'dislike posts',
            'guard_name'=>'web',
            ],
            ['name'=>'delete posts',
            'guard_name'=>'web',
            ],['name'=>'publish posts',
            'guard_name'=>'web',
            ],['name'=>'add accounts',
            'guard_name'=>'web',
            ],['name'=>'edit others accounts',
            'guard_name'=>'web',
            ],['name'=>'delete accounts',
            'guard_name'=>'web',
            ],['name'=>'add categories',
            'guard_name'=>'web',
            ],['name'=>'delete categories',
            'guard_name'=>'web',
            ],['name'=>'edit categories',
            'guard_name'=>'web',
            ],['name'=>'statistical posts with category',
            'guard_name'=>'web',
            ],]
        );

        DB::table('roles')->insert([
            ['name'=>'admin',
            'guard_name'=>'web',
            ],['name'=>'member',
            'guard_name'=>'web',
            ],
        ]);

        DB::table('role_has_permissions')->insert([
            ['permission_id'=>'1',
            'role_id'=>'2',
            ],['permission_id'=>'2',
            'role_id'=>'2',
            ],['permission_id'=>'3',
            'role_id'=>'2',
            ],['permission_id'=>'4',
            'role_id'=>'2',
            ],['permission_id'=>'5',
            'role_id'=>'2',
            ],['permission_id'=>'6',
            'role_id'=>'2',
            ],['permission_id'=>'7',
            'role_id'=>'2',
            ],['permission_id'=>'8',
            'role_id'=>'2',
            ],
            ['permission_id'=>'9',
            'role_id'=>'1',
            ],['permission_id'=>'10',
            'role_id'=>'1',
            ],['permission_id'=>'11',
            'role_id'=>'1',
            ],['permission_id'=>'12',
            'role_id'=>'1',
            ],['permission_id'=>'13',
            'role_id'=>'1',
            ],['permission_id'=>'14',
            'role_id'=>'1',
            ],['permission_id'=>'15',
            'role_id'=>'1',
            ],['permission_id'=>'16',
            'role_id'=>'1',
            ],['permission_id'=>'17',
            'role_id'=>'1',
            ],
        ]);

        DB::table('model_has_roles')->insert([
            ['role_id'=>'1',
            'model_type'=>'App\Models\User',
            'model_id'=>'2',
            ],['role_id'=>'2',
            'model_type'=>'App\Models\User',
            'model_id'=>'2',
            ],
        ]);
    }
}
