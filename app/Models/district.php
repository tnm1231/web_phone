<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    use HasFactory;
    protected $table = 'district';
    protected $fillable = [
        '_name',
        '_prefix',
        '_province_id',
    ];
    public function province()
    {
        return $this->belongsTo('App\Models\province', '_province_id', 'id');
    }
}
