<?php


namespace App\Student\Repositories;

use App\Student\Repositories\Contracts\StudentRepositoryInterface;
use App\Student\Student;


class EloquentStudentRepository implements StudentRepositoryInterface
{

    public function get(int $id): ?Student
    {
        return Student::find($id);
    }

    public function all(): array
    {
        return Student::all()->all();
    }

    public function findOrFail(int $id): Student
    {
        return Student::findOrFail($id);
    }

    public function store(Student $student)
    {
        $student->save();
    }

}
