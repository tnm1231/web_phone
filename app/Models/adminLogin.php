<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminLogin extends Model
{
    use HasFactory;
    protected $table = "admin_logins";
    protected $fillable = [
        'admin_id',
    ];
}
