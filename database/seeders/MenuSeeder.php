<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Mn1',
                'parent_id'=> '0',
                
            ],
            [
                'name' => 'Mn2',
                'parent_id'=> '0',

            ],
            [
                'name' => 'Mn3',
                'parent_id'=> '0',

            ],
            [
                'name' => 'Mn1.1',
                'parent_id'=> '1',

            ],
            [
                'name' => 'Mn1.2',
                'parent_id'=> '1',

            ],
            [
                'name' => 'Mn2.1',
                'parent_id'=> '2',

            ],
            [
                'name' => 'MN2.2',
                'parent_id'=> '2',

            ],
        ];
        DB::table('menus')->insert($data);
    }
}
