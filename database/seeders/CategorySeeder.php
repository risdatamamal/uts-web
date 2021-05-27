<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
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
        $categories = collect([
            'Novel',
            'Fantasy',
            'Comic',
            'Ensiclopedia',
            'Anthology',
            'Biography',
            'Horror',
            'Journal'
        ]);

        $categories->each(function ($categories) {
            Category::create([
                'name' => $categories,
                'slug' => Str::slug($categories ),
            ]);
        });
    }
}
