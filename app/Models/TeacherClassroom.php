<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherClassroom extends Model
{
    use UUID, SoftDeletes;

    protected $fillable = [
        'teacher_id',
        'classroom_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function classRooms()
    {
        return $this->belongsTo(ClassRoom::class);
    }
}
