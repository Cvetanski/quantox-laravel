<?php

namespace App\Student\Providers;

use App\Student\Repositories\Contracts\StudentRepositoryInterface;
use App\Student\Repositories\EloquentStudentRepository;
use Carbon\Laravel\ServiceProvider;

class StudentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            StudentRepositoryInterface::class,
            EloquentStudentRepository::class,
        );
    }
}
