<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['operatingSystem', 'status', 'issue'];

    public function users(){
        return $this->hasMany('App\User');
    }
}
