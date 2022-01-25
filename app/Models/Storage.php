<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;
    protected $table='storages';
    protected $fillable = [
        'address_id',
        'cart_id',
        'user_id',
        'bill_id',
    ];
    CONST STATUS_VUA_DAT_HANG         = 0;
    CONST STATUS_DA_XAC_NHAN          = 1;
    CONST STATUS_DANG_GIAO_HANG       = 2;
    CONST STATUS_DON_HANG_THANH_CONG  = 3 ;
    CONST STATUS_DON_HANG_HOAN_TRA    = 4;

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart', 'cart_id', 'id');
    }
    public function address()
    {
        return $this->belongsTo('App\Models\Address', 'address_id', 'id');
    }

}
