<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function assign()
    {
        return $this->hasMany(AssignBook::class);
    }

    public function bookstatus()
    {
        return $this->belongsTo(BookStatus::class,'book_status_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
