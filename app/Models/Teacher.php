<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use UUID, SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'teacher_subject_id',
        'phone_number',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teacherSubject()
    {
        return $this->belongsTo(TeacherSubject::class);
    }

    public function classRooms()
    {
        return $this->hasMany(TeacherClassroom::class);
    }

    public function teacherClassrooms()
    {
        return $this->hasMany(TeacherClassroom::class);
    }
}
