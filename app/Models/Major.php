<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relationship with Subjects
   public function subjects()
{
    return $this->belongsToMany(Subject::class, 'major_subject');
}


    // Relationship with Students
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}