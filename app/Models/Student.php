<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    public function courses(){
        
        return $this->belongsToMany(Student::class,
        'course_students',
        'course_id',
        'student_id',
        'id',
        'id'); 
}

}