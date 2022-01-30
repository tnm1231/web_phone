<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'qty',
        'bill_id',
        'address',
        'type',
    ];

    public function product()
    {
        return $this->belongsTo('\App\Models\product', 'product_id','id');

    }
    public function bill()
    {
        return $this->belongsTo('\App\Models\Bill', 'bill_id','id');
    }
    public function UserAddress()
    {
        return $this->belongsTo('\App\Models\Address','address','id');

    }

}
