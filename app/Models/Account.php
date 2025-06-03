<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;


    /**
     *
     * @var array<int, string>
     */

    protected $table = 'accounts';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     *
     * @var array<int, string>
     */

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public const ROLE_OWNER = 'owner';
    public const ROLE_ADMIN = 'admin';

    public const VALID_ROLES = [
        self::ROLE_OWNER,
        self::ROLE_ADMIN,

    ];


    public function profil()
    {
        return $this->hasOne(Profil::class);
    }

    // public function customers()
    // {
    //     return $this->hasMany(Customers::class);
    // }

}
