<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory;
    public function students(){
        return $this->hasMany(Student::class , 'student_id','id');
    }
    
    public function courses(){
        return $this->hasMany(Course::class ,'course_id','id');
    }
}