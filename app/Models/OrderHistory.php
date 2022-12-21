<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderHistory extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    // true      = order has been completed, user is allowed to review this order.
    // false     = order isn't done yet, user is NOT allowed to review this order.
    // canceled  = user didn't pay until specified time (+1 day from order is initiated by user).
    // NOTE = untuk mengecek apakah user telah membayar atau belum, bisa di cek pada atribut is_paid (true/false)  
    static public $enum_isDone = ['true', 'false', 'canceled'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
