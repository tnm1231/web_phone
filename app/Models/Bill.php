<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $fillable = [
        'hash',
        'status',
        'user_id',
        'address_id',
        'total',
    ];
    public function address()
    {
        return $this->belongsTo('App\Models\Address', 'address_id', 'id');
    }
    CONST STATUS_VUA_DAT_HANG       = 0;
    CONST STATUS_DA_XAC_NHAN        = 1;
    CONST STATUS_DANG_GIAO_HANG     = 2;
    CONST STATUS_DON_HANG_HOAN_TRA  = 3;
    CONST STATUS_DON_HANG_THANH_CONG  = 4;
}
