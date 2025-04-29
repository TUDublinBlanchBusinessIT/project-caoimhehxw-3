<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // You can specify the table if it's not following Laravel's naming convention
    // protected $table = 'categories'; 

    // You can define the fillable properties here
    protected $fillable = ['category_name'];

    // Add any relationships if needed
    // For example, if a category has many courses:
    // public function courses() {
    //     return $this->hasMany(Course::class);
    // }
}
