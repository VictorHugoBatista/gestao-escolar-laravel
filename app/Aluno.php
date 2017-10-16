<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    public function boletims()
    {
        return $this->hasMany('App\Boletim');
    }
}
