<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomorAkun extends Model
{
  protected $table = 'nomor_akun';
  protected $fillable=[
    'nomor_akun',
    'nama_akun',
  ]
}
