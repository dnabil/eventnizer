<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\City as LaravoltCityModel;

class City extends LaravoltCityModel
{
    use HasFactory;
    protected $guarded = ['id'];
    public function merchant()
    {
        return $this->hasMany(Merchant::class);
    }
}
