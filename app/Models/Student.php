<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use UUID, SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'classroom_id',
        'birth_date',
        'parent_name',
        'parent_number',
        'address',
        'status',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->whereHas('user', function ($query) use ($search) {
            $query->where('name', 'Like', '%' . $search . '%')
                ->orWhere('username', 'Like', '%' . $search . '%');
        });
    }

    // LANJUTKAN DARI SINI

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function bill()
    {
        return $this->hasMany(Bill::class);
    }
}
