<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
