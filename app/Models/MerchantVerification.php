<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantVerification extends Model
{
    use HasFactory;
    protected $fillable = [
        'merchant_id',
        'administrator_id',
        'isValid'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
