<?php


namespace App\Student\Commands;


use App\Student\Repositories\Contracts\StudentRepositoryInterface;
use App\Student\Student;

class CreateStudentCommand
{
    private $name;

    public function __construct(
        string $name
    ) {
        $this->name = $name;
    }

    public function handle(StudentRepositoryInterface $studentRepository)
    {
        $user = new Student();

        $user->setName($this->name);

        $studentRepository->store($user);
        return $user;
    }
}
