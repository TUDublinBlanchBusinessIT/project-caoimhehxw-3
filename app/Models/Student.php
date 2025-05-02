<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'date_of_birth', 'course_id']; // Ensure course_id is fillable

    /**
     * Define the relationship with the Course model.
     * A Student belongs to one Course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class); // This defines that each student belongs to one course
    }
}
