<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profils';
    protected $fillable = [
        'account_id',
        'cooperatives_id',
        'full_name',
        'gender',
        'address',
        'url_photo_profil',
        'phone',
        'birth_date',
        'birth_date_place',
        'diploma',
        'nik',
        'url_file_ktp',
        'kk',
        'url_file_kk',
        'salary',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);

    }

    // public function cooperatives()
    // {
    //     return $this->belongsTo(Cooperatives::class);
    // }
}
