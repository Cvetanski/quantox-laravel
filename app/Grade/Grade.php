<?php

namespace App\Grade;

use App\Student\Student;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';

    protected $fillable = [
        'grade'
    ];

    public function student()
    {
        return $this->belongsToMany(
            Student::class,
            'student_grade',
            'grade_id',
            'student_id'
        )->withTimestamps();
    }

}
