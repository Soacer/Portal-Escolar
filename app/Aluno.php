<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    //
    protected $fillable = [
        'id', 'numero_matricula', 'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
