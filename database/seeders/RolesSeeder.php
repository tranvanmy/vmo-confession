<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class RolesSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name'=>'admin',
              'guard_name'=>'web'
            ],
            ['name'=>'nguoidung',
             'guard_name'=>'web'
            ]
        ]);
        $user = User::find(1);
        $user->assignRole('admin');
    }
}
