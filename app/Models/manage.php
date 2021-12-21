<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manage extends Model
{
    use HasFactory;
    protected $table='manages';
    protected $fillable=[
        'title',
        'assignee',
        'duedate',
        'tag',
        'description',
    ];
}
