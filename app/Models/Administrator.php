<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Administrator extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function merchantVerification()
    {
        return $this->hasMany(MerchantVerification::class);
    }
}
