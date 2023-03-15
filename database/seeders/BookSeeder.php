<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Book::factory(100)->create();
        foreach (Book::get() as $book)
        {
            // $book->authors()->attach([Author::random()->id , Author::random()->id]);
            $book->authors()->attach([Author::get()->random()->id , Author::get()->random()->id]);
        }
    }
}
