<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['book_name', 'user_id','book_creator'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
