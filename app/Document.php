<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'franchise_id', 'role', 'name', 'file_name'
    ];
    public function franchise()
    {
        return $this->belongsTo('App\Franchise');
    }
}
