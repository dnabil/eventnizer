<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\MerchantVerification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merchant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function merchantVerification()
    {
        return $this->hasOne(MerchantVerification::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }



    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
