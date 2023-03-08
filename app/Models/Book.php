<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $id = 'ISBN';
    public $incrementing = false;
    function category() {
        return $this->belongsTo(category::class);
    }
}
