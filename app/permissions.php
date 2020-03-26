<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    //
    public function roles()
    {
        return $this->belongsToMany(\App\roles::class);
    }
}
