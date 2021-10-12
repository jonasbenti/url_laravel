<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelUrlResponse extends Model
{
    protected $table = 'url_response';
    protected $fillable = ['id_url','status_code','response'];

    public function relUrlresponse()
    {
        return $this->hasMany('App\Models\ModelUrlResponse', 'id_url');
    }
}
