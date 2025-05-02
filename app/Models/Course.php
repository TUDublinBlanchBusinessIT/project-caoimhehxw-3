<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'course_name',
        'course_description',
        'start_date',
        'status',
    ];
}

