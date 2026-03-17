<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentType extends Model
{
    use UUID, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'amount',
        'frequency',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
