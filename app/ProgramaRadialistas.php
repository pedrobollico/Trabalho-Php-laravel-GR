<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramaRadialistas extends Model
{
      protected $fillable = ['programa_id','radialista_id'];



      public function radialista() {
          return $this->belongsTo('App\Radialista');
      }
}
