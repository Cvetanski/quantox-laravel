<?php

namespace App\Student;

use App\Grade\Grade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    protected $table  = 'students';

    protected $fillable = [
        'name',
        'school_board_id',
        'math',
        'biology',
        'history',
        'technology',
        'average',
        'final_result'
    ];

    public function grade()
    {
        return $this->belongsToMany(
            Grade::class,
            'student_grade',
            'student_id',
            'grade_id'
        )->withTimestamps();
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getAverage():float
    {
        return $this->average;
    }

    public function getId():int
    {
        return $this->id;
    }

    public function setName(string $name)
    {
        $this->setAttribute('name',$name);
    }

    public function getMath():string
    {
        return $this->math;
    }

    public function getBilogy():string
    {
        return $this->biology;
    }

    public function getTechnology():string
    {
        return $this->technology;
    }

    public function getHistory():string
    {
        return $this->history;
    }
}
