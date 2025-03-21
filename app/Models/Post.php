<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','name','content'];
    protected $table = 'posts';
}

