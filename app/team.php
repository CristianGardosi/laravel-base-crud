<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    
    // FILLABLE
    protected $fillable = [
        'name',
        'city', 
        'superstar'
    ];
}
