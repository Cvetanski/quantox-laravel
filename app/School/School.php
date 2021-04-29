<?php

namespace App\School;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'school_boards';

    protected $fillable  = [
        'name'
    ];
}
