<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use UUID, SoftDeletes;

    protected $fillable = [
        'user_id',
        'classroom_id',
        'birth_date',
        'parent_name',
        'parent_number',
        'address',
        'status',
    ];
}
