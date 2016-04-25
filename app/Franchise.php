<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
    
    public function documents()
    {
        return $this->hasMany('App\Document');
    }
}
