<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $primaryKey = 'ISBN';
    public $incrementing = false;
    public $guarded = [];
    function category() {
        return $this->belongsTo(Category::class , 'category_id');
    }
}
