<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Fillable fields
    protected $fillable = ['course_name', 'course_description', 'start_date', 'status'];

    // Relationship with Students
    public function students()
    {
        return $this->hasMany(Student::class);  // A course has many students
    }
}
