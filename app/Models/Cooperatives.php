<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cooperatives extends Model
{
    protected $table = 'cooperatives';
    protected $fillable = [
        'name_cooperatives',
        'address',
        'no_telp',
    ];
}
