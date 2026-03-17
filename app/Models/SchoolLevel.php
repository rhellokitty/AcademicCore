<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolLevel extends Model
{
    use UUID, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function classRooms()
    {
        return $this->hasMany(ClassRoom::class);
    }
}
