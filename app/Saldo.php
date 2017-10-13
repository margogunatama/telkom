<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    //
    protected $fillable = ['type', 'amount', 'user_id'];
    public function user () {
        return $this->belongsTo('App\User');
    }
}
