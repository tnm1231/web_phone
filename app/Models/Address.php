<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = "addresses";
    protected $fillable = [
        'user_id',
        'fullname',
        'phone',
        'province',
        'district',
        'ward',
        'detailAdd',
        'email',
    ];
    public function user()
    {
        return $this->belongsTo('\App\Models\product', 'user_id','id');
    }
    public function toProvince()
    {
        return $this->belongsTo('\App\Models\province', 'province','id');
    }
    public function toDistrict()
    {
        return $this->belongsTo('\App\Models\district', 'district','id');
    }
    public function toWard()
    {
        return $this->belongsTo('\App\Models\ward', 'ward','id');
    }

}
