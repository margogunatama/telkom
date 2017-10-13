<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{

//    protected $table=
//    protected $primaryKey='id';
//    protected $timestamps=false;
    protected $fillable = [
        'name',
        'address',
        'description'
    ];
    protected $hidden = ['name', 'id', 'created_at', 'updated_at'];
}
