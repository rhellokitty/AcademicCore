<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassRoom extends Model
{
    use UUID, SoftDeletes;

    protected $fillable = [
        'teacher_id',
        'major_id',
        'school_level_id',
        'name',
        'grade',
        'year_start',
        'year_end',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function schoolLevel()
    {
        return $this->belongsTo(SchoolLevel::class);
    }

    public function teacherClassrooms()
    {
        return $this->hasMany(TeacherClassroom::class);
    }
}
