<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use UUID, SoftDeletes;

    protected $fillable = [
        'bill_id',
        'amount',
        'payment_date',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
