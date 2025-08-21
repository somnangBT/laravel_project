<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Major;
class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'major_id','created_at', 'updated_at','date_of_birth'];
    protected $table = 'students';

    // Relationship with Major
    public function major()
{
    return $this->belongsTo(Major::class);
}

public function subjects()
{
    return $this->belongsToMany(Subject::class);
}

    
}