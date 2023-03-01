<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $categories = [
       [ 'name' => 'الطبخ' ] ,
       [ 'name' => 'الكترونيات' ] ,
       [ 'name' => 'البرمجة' ] ,
       [ 'name' => 'قواعد البيانات' ] ,
       [ 'name' => 'الشعر' ] ,
    ];
    
    public function run()
    {
        foreach($this->categories as $cactegorie)
            Category::create($cactegorie);
    }
}
