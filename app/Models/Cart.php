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
        'price',
        'type',
    ];

    public function product()
    {
        return $this->belongsTo('\App\Models\product', 'product_id','id');

    }
}
