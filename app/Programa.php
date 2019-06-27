<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
  protected $fillable = [
    'nome', 'descricao', 'dia_hora', 'evento_id', 'classificacao_id', 'radialista_id',
];

  public function programa_radialistas() {
      return $this->hasMany('App\ProgramaRadialistas');
  }

  public function evento() {
      return $this->belongsTo('App\TipoEvento');
  }

  public function classificacao() {
      return $this->belongsTo('App\Classificacao');
  }



}
