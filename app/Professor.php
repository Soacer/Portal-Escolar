<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //
    protected $fillable = [
        'id', 'user_id'

    ];
    
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
