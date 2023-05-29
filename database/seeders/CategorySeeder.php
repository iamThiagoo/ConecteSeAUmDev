<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    private $categories = ['Linguagens', 'Frameworks', 'Idiomas'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->categories as $category)
        {
            Category::updateOrCreate([
                'name' => $category
            ], [
                'name' => $category
            ]);
        }
    }
}
