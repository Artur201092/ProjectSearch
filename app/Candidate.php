<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
      'name',
    'surname',
    'keywords',
    'file_name'
  ];
  public function getData() {

  }
}
