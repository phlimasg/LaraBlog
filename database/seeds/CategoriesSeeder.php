<?php

use App\Model\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'title' => 'Database',
            'description' => 'Destinado a tudo que se refere aos bancos de dados.'
        ]);
    }
}
