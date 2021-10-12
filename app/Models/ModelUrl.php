<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelUrl extends Model
{
    protected $table = 'url';
    protected $fillable = ['description_url','id_user','status_code','response'];

    public function relUsers()
    {
        return $this->hasOne('App\Models\User','id','id_user');
    }
}
