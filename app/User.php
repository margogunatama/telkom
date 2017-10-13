<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $with = ['saldos'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function saldos () {
        return $this->hasMany('App\Saldo');
    }

    public function totalSaldo() {
        $topup = $this->saldos()->where('type', 'topup')->sum('amount');
        $withdraw = $this->saldos()->where('type', 'withdraw')->sum('amount');

        return $topup - $withdraw;
    }
}
