<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'content',
        'category', // Add category here
        'image',
        'member_id',
        'price', // Add price here
        'province', // Add province here
    ];
    protected $table = 'posts';
}

