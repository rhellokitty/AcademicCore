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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function bill() {
        return $this->hasMany(Bill::class);
    }
}
