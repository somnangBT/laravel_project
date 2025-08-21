<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relationship with Majors
    public function majors()
    {
        return $this->belongsToMany(Major::class, 'major_subject');
    }

    // Relationship with Students
    public function students()
{
    return $this->belongsToMany(Student::class);
}

}