<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles_user extends Model
{
    //
    protected $fillable = [
        'user_id',
        'roles_id'
    ];

    protected $table = "roles_user";
}
