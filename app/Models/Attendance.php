<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use UUID, SoftDeletes;

    protected $fillable = [
        'student_id',
        'date',
        'status',
    ];
}
