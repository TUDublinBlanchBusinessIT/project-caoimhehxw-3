<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'date_of_birth', 'course_id']; // Add course_id to fillable

    public function course()
    {
        return $this->belongsTo(Course::class); // Define the relation to the Course model
    }
}
