<?php


namespace App\Student\Repositories\Contracts;
use App\Student\Student;

interface StudentRepositoryInterface
{
    public function get(int $id): ?Student;

    public function findOrFail(int $id): Student;

    public function all():array;

    public function store(Student $user);
}
