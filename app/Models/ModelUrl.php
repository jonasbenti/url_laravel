<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelUrl extends Model
{
    // use HasFactory;
    protected $table = 'url';
    protected $fillable = ['description_url','id_user','status_code','response'];

    public function relUsers()
    {
        return $this->hasOne('App\Models\User','id','id_user');
    }

    public function relUrl()
    {
        return $this->hasMany('App\Models\ModelUrl','id','id_user');
    }
}
