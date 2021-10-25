<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
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
                'name' => 'Quần áo',
                'parent_id'=> '0',
                'slug' => str::slug('quan-ao')
            ],
            [
                'name' => 'Giày',
                'parent_id'=> '0',
                'slug' => str::slug('giay')
            ],
            [
                'name' => 'Cặp',
                'parent_id'=> '0',
                'slug' => str::slug('cap')
            ],
            [
                'name' => 'Quần áo Nam',
                'parent_id'=> '1',
                'slug' => str::slug('quan-ao-nam')
            ],
            [
                'name' => 'Quần áo Nữ',
                'parent_id'=> '1',
                'slug' => str::slug('quan-ao-nu')
            ],
            [
                'name' => 'Giày Nam',
                'parent_id'=> '2',
                'slug' => str::slug('giay-nam')
            ],
            [
                'name' => 'Giày Nữ',
                'parent_id'=> '2',
                'slug' => str::slug('giay-nu')
            ],
        ];
        DB::table('categories')->insert($data);
    }
}
