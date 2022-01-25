<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ward extends Model
{
    use HasFactory;
    protected $table = 'ward';
    protected $fillable = [
        '_name',
        '_prefix',
        '_province_id',
        '_district_id',
    ];
    public function province()
    {
        return $this->belongsTo('App\Models\province', '_province_id', 'id');
    }
    public function district()
    {
        return $this->belongsTo('App\Models\district', '_district_id', 'id');
    }
}
