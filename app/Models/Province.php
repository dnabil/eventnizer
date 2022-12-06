<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\Province as LaravoltProvinceModel;

class Province extends LaravoltProvinceModel
{
    use HasFactory;
    protected $guarded = ['id'];

    public function merchant()
    {
        return $this->hasMany(Merchant::class);
    }
}
