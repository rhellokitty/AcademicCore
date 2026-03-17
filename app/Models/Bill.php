<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use UUID, SoftDeletes;

    protected $fillable = [
        'student_id',
        'payment_type_id',
        'amount',
        'description',
        'due_date',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
}
