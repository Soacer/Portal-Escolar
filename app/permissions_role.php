<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permissions_role extends Model
{
    //
    protected $fillable = [
        'roles_id',
        'permissions_id'
    ];
    
}
