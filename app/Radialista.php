<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radialista extends Model
{
    protected $fillable = ['nome', 'sobrenome', 'data_nascimeto', 'sexo', 'email', 'telefone'];

}
