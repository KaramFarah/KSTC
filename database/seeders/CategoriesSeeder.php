<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Vegetables',
            ],
            [
                'name' => 'Fruites',
            ],
            [
                'name' => 'Pre-Cut',
            ],
            [
                'name' => 'Pre-Packed',
            ],
            
        ];

        foreach($categories as $item){
            Category::firstOrCreate(['name' => $item['name']]);
        }
    }
}
