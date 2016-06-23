<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SumberDana extends Model
{
  protected $table = 'sumber_dana';
  protected $fillable=[
    'nama_sumber_dana',
    'alamat',
    'telepon',
    'fax',
    'email',
    'website',
  ];
}
