<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_book', function (Blueprint $table) {
            $table->foreignId('author_id')->constrained();
            $table->char('book_ISBN' , 13);
            $table->foreign('book_ISBN')->references('ISBN')->on('books')->onDelete('cascade');
            $table->primary(['author_id' , 'book_ISBN' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_book');
    }
};
