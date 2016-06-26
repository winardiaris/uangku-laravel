<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomorAkun extends Model
{
  protected $primaryKey = 'nomor_akun';
  protected $table = 'nomor_akun';
  protected $fillable=[
    'nomor_akun',
    'nama_akun',
    'sub',
  ];
}
