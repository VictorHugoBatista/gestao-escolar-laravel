<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boletim extends Model
{
    public function aluno()
    {
        return $this->belongsTo('Aluno');
    }
}
