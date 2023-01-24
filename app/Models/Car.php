<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand','model','price',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
