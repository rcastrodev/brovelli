<?php

use App\Category;
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
        Category::create([
            'order' => 'AA',
            'name' => 'Accesorios',
            'image' => 'images/category/Image737.png',
        ]);

        Category::create([
            'order' => 'BB',
            'name'  => 'Válvulas, canillería y repuestos',
            'image' => 'images/category/Group3693.png',
        ]);

    }
}
